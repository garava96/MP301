/**
 * ����� ������� ����������.
 * ���������� �������������� � �������������� Geolocation API ��������.
 * � ������ ��� ���������� ��� ������ ���������� �������������� �� IP � ������� API ������.����.
 * @see http://www.w3.org/TR/geolocation-API/
 * @see http://api.yandex.ru/maps/doc/jsapi/2.x/ref/reference/geolocation.xml
 * @class
 * @name GeolocationService
 */
function GeolocationService() {
    this._location = new ymaps.util.Promise();
};

/**
 * @lends GeolocationService.prototype
 */
GeolocationService.prototype = {
    /**
     * @constructor
     */
    constructor: GeolocationService,
    /**
     * ���������� �������������� ������������ ����� ���������� ����������.
     * @function
     * @name GeolocationService.getLocation
     * @params {Object} [options] ����� GeolocationAPI
     * @see http://www.w3.org/TR/geolocation-API/#position-options
     * @returns {ymaps.util.Promise} ���������� ������-��������.
     */
    getLocation: function (options) {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                ymaps.util.bind(this._onGeolocationSuccess, this),
                ymaps.util.bind(this._onGeolocationError, this),
                options
            );
        }
        else {
            this._location.resolve(
                this.getLocationByIP() || this.getDefaults()
            );
        }

        return this._sync();
    },
    /**
     * ������� ��� ������������ ��������, ����� ��� ������ ���� ������������
     * �� ����������������� ����.
     * @private
     * @function
     * @name GeolocationService._sync
     * @returns {ymaps.util.Promise} ������-�������.
     */
    _sync: function (p) {
        var promise = new ymaps.util.Promise();

        this._location.then(
            function (res) { promise.resolve(res); },
            function (err) { promise.reject(err); }
        );

        return promise;
    },
    /**
     * ����������� ������ ��� ���������� �������������� ��� ��������� ������� getLocation.
     * @private
     * @function
     * @name GeolocationService._reset
     */
    _reset: function () {
        this._location = new ymaps.util.Promise();
    },
    /**
     * ���������� ���������� ����������.
     * @private
     * @function
     * @name GeolocationService._onGeolocationSuccess
     * @param {Object} position ������ � ��������� ��������������.
     * @see http://www.w3.org/TR/geolocation-API/#position_interface
     */
    _onGeolocationSuccess: function (position) {
        this._location.resolve(position.coords);

        this._reset();
    },
    /**
     * ���������� ������ ����������.
     * @private
     * @function
     * @name GeolocationService._onGeolocationError
     * @param {Object|Number} error ������ ��� ��� ������.
     * @see http://www.w3.org/TR/geolocation-API/#position_error_interface
     */
    _onGeolocationError: function (error) {
        // ������� � ������� �������� ������.
        if(window.console) {
            console.log(error.message || this.constructor.GEOLOCATION_ERRORS[error + 1]);
        }

        this._location.resolve(
            this.getLocationByIP() || this.getDefaults()
        );

        this._reset();
    },
    /**
     * ���������� ������ � �������������� ������������ �� ������ ��� IP-������.
     * @see http://api.yandex.ru/maps/doc/jsapi/2.x/ref/reference/geolocation.xml
     * @function
     * @name GeolocationService.getLocationByIP
     * @returns {Object|null} �������������� ������������.
     */
    getLocationByIP: function () {
        return ymaps.geolocation;
    },
    /**
     * ���������� �������������� �� ���������.
     * ������ ��� ����������.
     * @function
     * @name GeolocationService.getDefaults
     * @returns {Object} �������������� ������������.
     */
    getDefaults: function () {
        // �� ��������� ���������� ������.
        return {
            latitude: 55.751574,
            longitude: 37.573856,
            zoom: 9
        };
    }
};

/**
 * ���������������� �������� ����� ������ Geolocation API.
 * @see http://www.w3.org/TR/geolocation-API/#position_error_interface
 * @static
 */
GeolocationService.GEOLOCATION_ERRORS = [
    'permission denied',
    'position unavailable',
    'timeout'
];