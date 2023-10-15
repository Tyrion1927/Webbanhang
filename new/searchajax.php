<html>
<body>
<script>
	var xmlHttp = getHTTPObject();
	function getHTTPObject() {
		var xmlhttp;
		if (window.XMLHttpRequest) {
		/*Lấy đối tượng XMLHttpRequest đối với các browser
		Firefox, Opera 8.0+, Safari, BlueBird,…*/
		xmlhttp = new XMLHttpRequest(); 
		}else if (window.ActiveXObject){
		//Lấy đối tượng ActiveXObject đối với browser IE
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		return xmlhttp;
	}
	//Thay đổi trạng thái của đối tượng dùng để hiển thị CSDL
	function stateChanged(){
		if (xmlHttp.readyState==4)
		 {	 
			document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
		 }
	}
	//Hiển thị dữ liệu từ trang xử lý, gửi dữ liệu đến trang xử lý
	function showHint(str){
	if (str.length==0){
	  document.getElementById("txtHint").innerHTML="";
	  return}
	xmlHttp = getHTTPObject();
	if (xmlHttp==null){
	  alert ("Trình duyệt của bạn không hỗ trợ AJAX");
	  return}
	var url="select.php";
	url=url+"?q="+str;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null)};
</script>
<form>
Tên sản phẩm:
<input type="text" id="txt1" onkeyup="showHint(this.value);" />
</form>
<p>Danh sách tên sản phẩm:</p>
<span id="txtHint"></span>
</body>
</html>
