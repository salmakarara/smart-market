<h1>The XMLHttpRequest Object</h1>

<form action=""> 
<select name="customers" onchange="showCustomer(this.value)">
<option value="">Select a customer:</option>
<option value="2851010251366">Gamal Ali</option>
<option value="2851010251396 ">Hassan Ali</option>
 
</select>
</form>
<br>
<div id="txtHint">Customer info will be listed here...</div>

<script>
function showCustomer(str){
  var xhttp;    
  if (str == ""){
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getparent.php?q="+str, true);
  xhttp.send();
}
</script>

</body>
</html>
