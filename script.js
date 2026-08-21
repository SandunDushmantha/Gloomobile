function changeView() {
    var logInBox = document.getElementById("logInBox");
    var registerBox = document.getElementById("registerBox");

    logInBox.classList.toggle("d-none");
    registerBox.classList.toggle("d-none");
}


function logIn() {

    var em = document.getElementById("em");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    var f = new FormData();

    f.append("em", em.value);
    f.append("p", pw.value);
    f.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
              window.location ="index.php";

            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block"
                swal("Error", response, "error");
            }
        }
    }

    request.open("POST", "logInProcess.php", true);
    request.send(f);

}


function register() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var email = document.getElementById("email");
  var password = document.getElementById("password");

  //alert(fname.value);

  var f = new FormData();
  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("m", mobile.value);
  f.append("e", email.value); 
  f.append("p", password.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //alert(response);
      if (response == "Success") {
        document.getElementById("msg1").innerHTML = "Registration Success !";
        document.getElementById("msgDiv1").className = "d-block";
        window.location = "index.php";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msgDiv1").className = "d-block";
        swal("Error", response, "error");
      }
    }
  }

  request.open("POST", " registerProcess.php", true);
  request.send(f);
}


function adminLogIn() {
 
  var em = document.getElementById("em");
  var pw = document.getElementById("pw");

  // alert(em.value);

  var f = new FormData();
  f.append("e", em.value);
  f.append("p", pw.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;
          // alert(response);
          if (response == "Success") {
              window.location = "adminDashboard.php";
          } else {
              document.getElementById("msg").innerHTML = response;
              document.getElementById("msgDiv").className = "d-block";
              swal("Error", response, "error");
          }
      }
  };

  request.open("POST", "adminLogInProcess.php", true);
  request.send(f);

   
}

function loadUser() {

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;

          document.getElementById("tb").innerHTML = response;
      }
  }

  request.open("POST", "loadUserProcess.php", true);
  request.send();
}

function updateUserStatus() {
  var userid = document.getElementById("uid");

  var f = new FormData();
  f.append("u", userid.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;
          // alert (response);
          if (response == "Deactivate") {
              document.getElementById("msgDiv").className = "d-block";
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "You successfully Deactivated the user",
                showConfirmButton: false,
                timer: 1500
              });
             
              userid.value = "";

              loadUser();

            } else if (response == "Activate") {
              document.getElementById("msgDiv").className = "d-block";
              Swal.fire({
                position: "top-end",
                icon: "success",
                title: "You successfully Activated the user",
                showConfirmButton: false,
                timer: 1500
              });
              userid.value = "";

              loadUser();

          } else  {
              document.getElementById("msg").innerHTML = response;
              document.getElementById("msgDiv").className = "d-block";
                Swal.fire({
                  position: "top-end",
                   icon: "warning",
                  title: "Please Enter the User Id ",
                  showConfirmButton: false,
                  timer: 1500
                });

          }
      }
  }

  request.open("POST", "updateUserStatusProcess.php", true);
  request.send(f);
}


function reload() {
  location.reload();
}

function brandReg() {

  var brand = document.getElementById("brand");

  var f = new FormData();
  f.append("b", brand.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;

          if (response == "Success") {
              document.getElementById("msg1").innerHTML = "Brand Registration Successfully";
              document.getElementById("msg1").className = "alert alert-success";
              document.getElementById("msgDiv1").className = "d-block";
              brand.value = "";
          } else {
            document.getElementById("msg1").innerHTML = response;
            document.getElementById("msgDiv1").className = "d-block"; 
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
            });
          }
    }
  }

  request.open("POST", "brandRegisterProcess.php", true);
  request.send(f);
}

function catReg() {

  var category = document.getElementById("category");

  var f = new FormData();
  f.append("c", category.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;

          if (response == "Success") {
              document.getElementById("msg2").innerHTML = "Category Registration Successfully";
              document.getElementById("msg2").className = "alert alert-success";
              document.getElementById("msgDiv2").className = "d-block";
              category.value = "";
          } else {
              document.getElementById("msg2").innerHTML = response;
              document.getElementById("msgDiv2").className = "d-block";
          }
      }
  }

  request.open("POST", "categoryRegisterProcess.php", true);
  request.send(f);
}

function colorReg() {

  var color = document.getElementById("color");

  var f = new FormData();
  f.append("color", color.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;

          if (response == "Success") {
              document.getElementById("msg3").innerHTML = "Color Registration Successfully";
              document.getElementById("msg3").className = "alert alert-success";
              document.getElementById("msgDiv3").className = "d-block";
              color.value = "";
          } else {
              document.getElementById("msg3").innerHTML = response;
              document.getElementById("msgDiv3").className = "d-block";
          }
      }
  }

  request.open("POST", "colorRegisterProcess.php", true);
  request.send(f);
}

function warrentyReg() {

  var warrenty = document.getElementById("warrenty");

  var f = new FormData();
  f.append("warrenty", warrenty.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;

          if (response == "Success") {
              document.getElementById("msg4").innerHTML = "Warrenty Time Period Registration Successfully";
              document.getElementById("msg4").className = "alert alert-success";
              document.getElementById("msgDiv4").className = "d-block";
              size.value = "";
          } else {
              document.getElementById("msg4").innerHTML = response;
              document.getElementById("msgDiv4").className = "d-block";
          }
      }
  }

  request.open("POST", "warrentyRegisterProcess.php", true);
  request.send(f);
}

function regProduct() {

  var pname = document.getElementById("pname");
  var brand = document.getElementById("brand");
  var cat = document.getElementById("cat");
  var color = document.getElementById("color");
  var size = document.getElementById("size");
  var desc = document.getElementById("desc");
  var file = document.getElementById("file");


  var form = new FormData();
  form.append("pname", pname.value);
  form.append("brand", brand.value);
  form.append("cat", cat.value);
  form.append("color", color.value);
  form.append("size", size.value);
  form.append("desc", desc.value);
  form.append("image", file.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = this.responseText;
          alert(response);

      }
  }
  
  request.open("POST","productRegProcess.php", true);
  request.send(form);
}

function regProduct() {
   
  var pname = document.getElementById("pname");
  var brand = document.getElementById("brand");
  var cat = document.getElementById("cat");
  var color = document.getElementById("color");
  var warrenty = document.getElementById("warrenty");
  var desc = document.getElementById("desc");
  var file = document.getElementById("file");

  var form = new FormData();
  form.append("pname", pname.value);
  form.append("brand", brand.value);
  form.append("cat", cat.value);
  form.append("color", color.value);
  form.append("warrenty", warrenty.value);
  form.append("desc", desc.value);
  form.append("image", file.files[0]);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 & request.status == 200) {
      var response = request.responseText;
      if (response == "Success") {
        alert("Product Registration Successfully");
        location.reload();
      } else {
        alert(response);
      }
    }
  };
  
  request.open("POST", "productRegProcess.php", true);
  request.send(form);
}


function updateStock() {
    var pname = document.getElementById("selectProduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("uprice");
  
    //alert(pname.value);
  
    var f = new FormData();
  
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);
  
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;
        alert(response);
        location.reload();
      }
    };
  
    request.open("POST", "updateStockProcess.php", true);
    request.send(f);
}


function printDiv() {
  var originalContent = document.body.innerHTML;
  var printArea = document.getElementById("printArea").innerHTML;

  document.body.innerHTML = printArea;

  window.print();

  document.body.innerHTML = originalContent;
}

function loadProduct(x) {
  var page = x;
  // alert(x);

  var f = new FormData();
  f.append("p", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //alert(response);
      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "loadProductProcess.php", true);
  request.send(f);

}  


function searchProduct(x) {
  var page = x;
  var product = document.getElementById("product");

  // alert(page);
  // alert(product.value);

  var f = new FormData();
  f.append("p", product.value);
  f.append("pg", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //  alert(response);
      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "searchProductProcess.php", true);
  request.send(f);
}


function viewFilter() {
  var filterElement = document.getElementById("filterId");
  var currentClass = filterElement.className;

  if (currentClass.includes("d-block")) {
    filterElement.className = "d-none";
  } else {
    filterElement.className = "d-block";
  }
}

// advance search
function advSearchProduct(x) {
  // alert("ok");
  var page = x;
  var color = document.getElementById("color");
  var cat = document.getElementById("cat");
  var brand = document.getElementById("brand");
  var warrenty = document.getElementById("warrenty");
  var min = document.getElementById("min");
  var max = document.getElementById("max");

  var f = new FormData();
  f.append("pg", page);
  f.append("co", color.value);
  f.append("cat", cat.value);
  f.append("b", brand.value);
  f.append("warrenty", warrenty.value);
  f.append("min", min.value);
  f.append("max", max.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if ((r.readyState == 4) & (r.status == 200)) {
      var response = r.responseText;
      // alert(response);
      document.getElementById("pid").innerHTML = response;

      color.value = "0";
      cat.value = "0";
      brand.value = "0";
      warrenty.value = "0";
      min.value = "";
      max.value = "";
    }
  };

  r.open("POST", "advSearchProductProcess.php", true);
  r.send(f);
}


function uploadImg() {
  var img = document.getElementById("imgUploader");

  var f = new FormData();
  f.append("i", img.files[0]);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
          var response = request.responseText;
          if (response == "empty") {
              alert("Please Select your Profile Image");
          } else if (response !== "success") {
              reload();
          } else {
              document.getElementById("i").src = response;
              img.value = "";
          }
      }
  };

  request.open("POST", "profileImgUploadProcess.php", true);
  request.send(f);
}

function updateData() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var password = document.getElementById("password");
  var address = document.getElementById("address");
  
  var f = new FormData();
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("mobile", mobile.value);
  f.append("password", password.value);
  f.append("address", address.value);


  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;
          alert(response);
      }
  };

  request.open("POST", "updateDataProcess.php", true);
  request.send(f);
}

function signout(){
    
  var request = new XMLHttpRequest();

  request.onreadystatechange = function (){
      if (request.readyState == 4 && request.status ==200) {
          var response = request.responseText;
          alert(response);
          reload();
      }
  }

  request.open("POST","signoutProcess.php",true);
  request.send();
}


function addtoCart(x) {

  // alert(x);

  var stockId = x;
  var qty = document.getElementById("qty");

  if (qty.value > 0) { //not = empty
      //alert("OK");

      var f = new FormData();
      f.append("s", stockId);
      f.append("q", qty.value);

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (request.readyState == 4 & request.status == 200) {
              var response = request.responseText;
              // alert(response);
              swal("Success!", response, "success");
              qty.value = "";
          }
      }

      request.open("POST", "addtoCartProcess.php", true);
      request.send(f);

  } else {
      alert("Please Enter Valid Quantity");
  }

}

function loadCart() {
  //alert("OK");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 & request.status == 200) {
          var response = request.responseText;
          //alert(response);
          document.getElementById("cartBody").innerHTML = response;
      }
  }

  request.open("POST", "loadCartProcess.php", true);
  request.send();
}


function decrementCartQty(x) {
  //alert(x);

  var cardId = x;
  var qty = document.getElementById("qty" + x);

  var newQty = parseInt(qty.value) - 1; //integer
  //alert(newQty);

  var f = new FormData();
  f.append("c", cardId);
  f.append("q", newQty);

  if (newQty > 0) {
      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (request.readyState == 4 & request.status == 200) {
              var response = request.responseText;
              //alert(response);

              if (response == "Success") {
                  qty.value = parseInt(qty.value) - 1;
                  loadCart();
              } else {
                  alert(response);
              }
          }
      }

      request.open("POST", "updateCartQtyProcess.php", true);
      request.send(f);
  }


}


function removeCart(x) {
  //alert(x);

  if (confirm("Are You Suer Deleting This Item?")) {

      var f = new FormData();
      f.append("c", x);

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (request.readyState == 4 & request.status == 200) {
              var response = request.responseText;
              alert(response);
              reload();
          }
      }


      request.open("POST", "removeCartProcess.php", true);
      request.send(f);

  }

}

function checkout() {
  // alert("ok");

  var f = new FormData();
  f.append("cart", true) //me vidiyata apita puluwan cart ekenmada me req eka enne kiyala check karaganna.

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          var response = request.responseText;
          // alert(response);
          var payment = JSON.parse(response);
          doCheckout(payment, "checkoutProcess.php")
      }
  }

  request.open("POST", "paymentProcess.php", true);
  request.send(f);
}

function doCheckout(payment, path) {

  // Payment completed. It can be a successful failure.
  payhere.onCompleted = function onCompleted(orderId) {
      console.log("Payment completed. OrderID:" + orderId);
      // Note: validate the payment and show success or failure page to the customer

      var f = new FormData();
      f.append("payment", JSON.stringify(payment));

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
              var response = request.responseText;
              if (response == "Success") {
                  reload();
              } else {
                  alert(response);
              }
          }
      }

      request.open("POST", path, true);
      request.send(f);
  };

  // Payment window closed
  payhere.onDismissed = function onDismissed() {
      // Note: Prompt user to pay again or show an error page
      console.log("Payment dismissed");
  };

  // Error occurred
  payhere.onError = function onError(error) {
      // Note: show an error page
      console.log("Error:" + error);
  };

  // Show the payhere.js popup, when "PayHere Pay" is clicked
  // document.getElementById('payhere-payment').onclick = function (e) {
  payhere.startPayment(payment);
};


function buyNow(stockId) {
  // alert(stockId);
  var qty = document.getElementById("qty");

  if (qty.value > 0) {
      // alert("ok");
      var f = new FormData();
      f.append("cart", false);
      f.append("stockId", stockId);
      f.append("qty", qty.value);

      var request = new XMLHttpRequest();
      request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
              var response = request.responseText;
              // alert(response);
              var payment = JSON.parse(response);
              payment.stockId = stockId;
              payment.qty = qty.value;
              doCheckout(payment, "buyNowProcess.php");
          }
      };

      request.open("POST", "paymentProcess.php", true);
      request.send(f);
  } else {
      alert("Please Enter Valid Qty");
  }


}
