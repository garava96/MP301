//0 - ���� �������; 1  - ���� �������;  
var popupStatus = 0;
// ���������� (���������) ����, ��������� ������� jQuery  
function loadPopup(){  
  // ��������� ���� ������ ���� ��� �������
  if(popupStatus==0){  
    $("#backgroundPopup").css({  
      "opacity": "0.7"  
    });  
    $("#backgroundPopup").fadeIn("slow");  
    $("#popupContact").fadeIn("slow");  
    popupStatus = 1;  
  }  
}
// �������� (���������) ����, ��������� ������� jQuery
function disablePopup(){  
  // ��������� ���� ������ ���� ��� �������
  if(popupStatus==1){  
    $("#backgroundPopup").fadeOut("slow");  
    $("#popupContact").fadeOut("slow");  
    popupStatus = 0;  
  }  
}
// ���� ����� ����������� � ������ �������� 
function centerPopup(){  
  // ������ � ������ ���� ��������  
  var windowWidth = document.documentElement.clientWidth;  
  var windowHeight = document.documentElement.clientHeight;  
  var popupHeight = $("#popupContact").height();  
  var popupWidth = $("#popupContact").width();  
  // ��������� ���� � ������ �������� 
  $("#popupContact").css({  
    "position": "absolute",  
    "top": windowHeight/2-popupHeight/2,  
    "left": windowWidth/2-popupWidth/2  
  });  
  // ������ ��� MS IE 6   
  $("#backgroundPopup").css({  
    "height": windowHeight  
  });  
}
// ����������� �������
$(document).ready(function(){
  // �������� ����
  // ������� - ������ �� ������
  $("#button").click(function(){
    // ��������� ���� � ������ ��������
    centerPopup();
    // ��������� ����
    loadPopup();
  });
                
  // �������� ����
  // ������� - ������ �� "x"
  $("#popupContactClose").click(function(){
    // ��������� ����
    disablePopup();
  });
  // ������� - ������ �� ��������� ����
  $("#backgroundPopup").click(function(){
    // ��������� ����
    disablePopup();
  });
  // ������� - ������ ������� Escape
  $(document).keypress(function(e){
    if(e.keyCode==27 && popupStatus==1) {
      // ��������� ����
      disablePopup();
    }
  });
});