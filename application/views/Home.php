<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<p id="mydivs" style="background-color:yellow;width:20%;">   
        <?php echo $this->session->flashdata('item'); ?>
</p>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<!-- <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Welcome</a>
  
  
  <button type="button" class="btn btn-dark" onclick="location.href='<?php echo base_url('admin/logout');?>'">Logout</button>
</nav> -->

<div class="container">
  <h3>Manage Products</h3>
  
  <div class="row mt-5">
    <div class=" col-lg-8">
    <div><button type="button" class="btn btn-warning add-products mb-3">Add Products</button>
    <select id="search_keyword" class="search mt-3" style="float:right;display:inline;" >
        <option selected>All</option>
        <option value="1">mobile</option>
        <option value="2">laptop</option>

      </select>

  </div>
    <table class="table table-bordered table-hover" id="location">
    <thead style="background-color:#00264d;color:white;">
      <tr>
        <th>Order</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Date </th>
      </tr>
    </thead>
    <tbody class="product-row">
      <!--
      <tr>
        <td id="product_number_show"></td>
        <td id="product_name_show"></td>
        <td id="product_cat_show"></td>
        <td id="product_status_show"></td>
        <td id="action"></td>
        <td id="edit_button"></td>
        <td id="delete_button"></td>
        <td id="date"></td>
      </tr> -->
    </tbody>
  </table>
    </div>
<!-- ADD PRODUCT FORM -->
<div class=" col-lg-4 add-form">
<form method="POST" class="form-add">
<h3>Add Form</h3>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_number">Product Number</label>
      <input type="text" class="form-control" id="product_number" placeholder="Product Number" required="required">
    </div>
    <div class="form-group col-md-6">
      <label for="product_name">Product Name</label>
      <input type="text" class="form-control" id="product_name" placeholder="Product Name" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="product_desc">Product Description</label>
    <textarea class="form-control" id="product_desc" rows="3" placeholder="About the product" required="required"></textarea>
  </div>
  <div class="form-row">
    <div class="form-group">
        <label for="product_cat">Product Category </label>
        <input type="text" class="form-control" id="product_cat" placeholder="Product Category" required="required">
    </div>
    <div class="form-group col-md-4">
      <label for="product_status">Status</label>
      <select id="product_status" class="form-control" required="required">
        <option selected></option>
        <option>Active</option>
        <option>Inactive</option>

      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="submit">Add Product</button>
</form>
</div>
<!-- EDIT FORM -->
<div class=" col-lg-4 edit-form">
<form method="POST" class="form-edit">
  <h3>Edit Form</h3>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="product_number">Product Number</label>
      <input type="text" class="form-control" id="product_number_edit" placeholder="Product Number" >
    </div>
    <div class="form-group col-md-6">
      <label for="product_name">Product Name</label>
      <input type="text" class="form-control" id="product_name_edit" placeholder="Product Name">
    </div>
  </div>
  <div class="form-group">
    <label for="product_desc">Product Description</label>
    <textarea class="form-control" id="product_desc_edit" rows="3" placeholder="About the product"></textarea>
  </div>
  <div class="form-row">
    <div class="form-group">
        <label for="product_cat">Product Category </label>
        <input type="text" class="form-control" id="product_cat_edit" placeholder="Product Category">
    </div>
    <div class="form-group col-md-4">
      <label for="product_status">Status</label>
      <select id="product_status_edit" class="form-control">
        <option selected></option>
        <option>Active</option>
        <option>Inactive</option>

      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-success update-button" id="submit">Update</button>
</form>
</div>
<!-- DETAILS -->
<div class=" col-lg-4 card product-desc" style="width: 18rem;">
  <!--<img class="card-img-top" src="..." alt="Card image cap">-->
  <div class="card-body">
    <h5 class="card-title" id="product_name_view"></h5>
    <p class="card-text" id="product_desc_view"></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="font-weight:bold;" >Product Category:<li class="list-group-item"id="product_cat_view"></li></li>
    <li class="list-group-item" style="font-weight:bold;" >Product Status:<li class="list-group-item"id="product_status_view"></li></li>
    
  </ul>
  <div class="card-body">
  <button class="btn btn-danger close-view">close</button>
  </div>
</div>
</div>
</div>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
  function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
    setTimeout(function() {
        $('#mydivs').hide('fast');
    }, 3000);
   
    $(document).ready(function(){
        $('.add-form').hide();
        $('.edit-form').hide();
        $('.product-desc').hide();
        $('.add-products').click(function(){
          $('.add-form').val('');
            $('.add-form').show();
        });
        loadProductDetails(); //load product table when the page opens

 //----To close the window of product details---       
        $(".close-view").click(function(){
          $('.product-desc').hide();
        });

//-------to view product details window------
        $(document).on('click','.product_name',function(e){
          e.preventDefault();
          var product_name = $(this).closest('tr').find('.product_name').text();
          $.ajax({
            method:"POST",
            url:'<?=base_url()?>ProductController/view_products',// always set a route
            data :{product_name:product_name},
            dataType:"json",
            success: function(response){
                console.log(response.result);
                $.each(response.result,function(key,value){
                  $('#product_name_view').html(value['product_name']);
                  $('#product_desc_view').html(value['product_desc']);
                  $('#product_cat_view').html(value['product_cat']);
                  $('#product_status_view').html(value['product_status']);
                  $('.product-desc').show();
                  
                });
            },
            error: function(){
              alert("went wrooong");
            }
          });
        }
        );

//--------run when update button clicked-------
        $(document).on('click','.update-button',function(e){
          /*
         var data = {
           "product_number" : $('#product_number_edit').val(),
           "product_name" : $('#product_name_edit').val(),
           "product_desc" : $('#product_desc_edit').val(),
           "product_cat" : $('#product_cat_edit').val(),
           "product_status" : $('#product_status_edit').val(),
         }; */
         e.preventDefault();
         var product_number = $('#product_number_edit').val();
         var product_name = $('#product_name_edit').val();
          var product_desc = $('#product_desc_edit').val();
           var product_cat= $('#product_cat_edit').val();
           var product_status =  $('#product_status_edit').val();
           $('.form-edit')[0].reset();
         $.ajax({
           type :"POST",
           url :'<?=base_url()?>ProductController/update_products',
           data : {product_number :product_number,
                  product_name :product_name,
                  product_desc:product_desc,
                  product_cat:product_cat,
                  product_status:product_status},
           dataType:"json",
           success: function(response){
            $('.product-row').html("");
            loadProductDetails();
            $('.edit-form').hide();
            alert("updated succesfully");
          },
           error :function(){
             alert("something went wrong");
           }
         });
        });
//---------Enable button clicked and status change to Active-----
        $(document).on("click",'.enable-button',function(){
        
          var product_number = $(this).closest('tr').find('.product_number').text();
          var product_status = "Active";
          $.ajax({
            method:"POST",
            url:'<?=base_url()?>ProductController/change_status',
            data : {product_number :product_number,
                     product_status:product_status},
            dataType:"json",
            success: function(response){
              $('.product-row').html("");
              loadProductDetails();
              alert("status changed");
            },

          });
        });
//---------Disable button clicked and status change to Active-----
$(document).on("click",'.disable-button',function(){
          
          var product_number = $(this).closest('tr').find('.product_number').text();
          var product_status = "Inactive";
          $.ajax({
            method:"POST",
            url:'<?=base_url()?>ProductController/change_status',
            data : {product_number :product_number,
                     product_status:product_status},
            dataType:"json",
            success: function(response){
              $('.product-row').html("");
              loadProductDetails();
              alert("status changed");
            },

          });
        });
//---------EDIT PRODUCT--------

        $(document).on('click','.edit-button',function(){
         // $('.edit-form').show();
          var product_number = $(this).closest('tr').find('.product_number').text();
          $.ajax({
            method:"POST",
            url:'<?=base_url()?>ProductController/edit_products',
            data :{product_number:product_number},
            dataType:"json",
            success: function(response){
                //console.log(response.result);
                $.each(response.result,function(key,value){
                  $('#product_number_edit').val(value['product_number']);
                  $('#product_name_edit').val(value['product_name']);
                  $('#product_desc_edit').val(value['product_desc']);
                  $('#product_cat_edit').val(value['product_cat']);
                  $('#product_status_edit').val(value['product_status']);
                  $('.edit-form').show();
                });
            },
            error: function(){
              alert("went wrooong");
            }
          });
        });
   

    
//----------DELETE ------------

        $(document).on('click','.delete-button',function(){
          //e.preventDefault();
          var product_number = $(this).closest('tr').find('.product_number').text();
          //alert(product_number);
          confirmDialog = confirm("are u sure to delete product number: "+product_number);
          if(confirmDialog){
            $.ajax({
              method:"POST",
              url:'<?=base_url()?>ProductController/delete_products',
              data:{product_number:product_number},
              //dataType:"json",
              success: function(response){
                /*
                console.log(response.result);
                if(response.result == true){
                  alert("hai");
                  $('.product-row').html("");
                  loadProductDetails();
                }
                */
                $('.product-row').html("");
                loadProductDetails();
                alert("Deleted Succesfully");
                
              },
              error: function(){
                  alert("something went wrong");
                }
              
            });
          }
        });
    });

//--------function to load product details------
    
    function loadProductDetails(){
          $.ajax({
            type:"GET",
            url:'<?=base_url()?>ProductController/get_products',
            //data:{product_details:"all"},
            dataType: 'json',
            success: function(response){
              if(response.result === "no-result"){
                alert("Sorry No result");
              }
              else{

                $.each(response.result,function(key,value){
                  //console.log(value['product_status']);
                  var prod_status = value['product_status'];
                  //console.log(prod_status);
                  if(prod_status === "Active"){
                    //console.log("hai active");
                    $('.product-row').append('<tr>\
                      <td class="product_number">'+value['product_number']+'</td>\
                      <td class="product_name" style="font-weight:bolder;color:blue;">'+value['product_name']+'</td>\
                      <td>'+value['product_cat']+'</td>\
                      <td style="font-weight:bolder;color:green;">'+value['product_status']+'</td>\
                      <td><button class="btn btn-danger disable-button">Disable</button></td>\
                      <td><button class="btn btn-primary edit-button">Edit</button></td>\
                      <td><button class="btn btn-danger delete-button">Delete</button></td>\
                      <td>'+value['created_at']+'</td>\
                    </tr>');
                  }
                  else{
                    $('.product-row').append('<tr>\
                      <td class="product_number">'+value['product_number']+'</td>\
                      <td class="product_name" style="font-weight:bolder;color:blue;">'+value['product_name']+'</td>\
                      <td>'+value['product_cat']+'</td>\
                      <td style="font-weight:bolder;color:red;">'+value['product_status']+'</td>\
                      <td><button class="btn btn-success enable-button">Enable</button></td>\
                      <td><button class="btn btn-primary edit-button">Edit</button></td>\
                      <td><button class="btn btn-danger delete-button">Delete</button></td>\
                      <td>'+value['created_at']+'</td>\
                    </tr>');
                  }
                });
              }
            }
          });
    }
  //---------SEARCH---------
  $(document).ready(function(){
          $('#search_keyword').change(function(){
            var values = $("#search_keyword option:selected");
            var search_item = values.text();
            if (search_item === "All"){
              $('.product-row').html("");
              loadProductDetails();
            }
            else{
              $.ajax({
                method:"POST",
                url:'<?=base_url()?>ProductController/search_products',
                data :{search_item:search_item},
                dataType:"json",
                success: function(response){
                  console.log(response.result);
                  if(response.result === "no-result"){
                  alert("Sorry No result");
                }
                else{
                  $('.product-row').html("");
                  $.each(response.result,function(key,value){
                    //console.log(value['product_status']);
                    var prod_status = value['product_status'];
                    //console.log(prod_status);
                    if(prod_status === "Active"){
                      //console.log("hai active");
                      $('.product-row').append('<tr>\
                        <td class="product_number">'+value['product_number']+'</td>\
                        <td class="product_name" style="font-weight:bolder;color:blue;">'+value['product_name']+'</td>\
                        <td>'+value['product_cat']+'</td>\
                        <td style="font-weight:bolder;color:green;">'+value['product_status']+'</td>\
                        <td><button class="btn btn-danger disable-button">Disable</button></td>\
                        <td><button class="btn btn-primary edit-button">Edit</button></td>\
                        <td><button class="btn btn-danger delete-button">Delete</button></td>\
                        <td>'+value['created_at']+'</td>\
                      </tr>');
                    }
                    else{
                      $('.product-row').append('<tr>\
                        <td class="product_number">'+value['product_number']+'</td>\
                        <td class="product_name" style="font-weight:bolder;color:blue;">'+value['product_name']+'</td>\
                        <td>'+value['product_cat']+'</td>\
                        <td style="font-weight:bolder;color:red;">'+value['product_status']+'</td>\
                        <td><button class="btn btn-success enable-button">Enable</button></td>\
                        <td><button class="btn btn-primary edit-button">Edit</button></td>\
                        <td><button class="btn btn-danger delete-button">Delete</button></td>\
                        <td>'+value['created_at']+'</td>\
                      </tr>');
                    }
                  });
                }
                }

              });
            }
          });
        });

  //-------Run when a product add(submit/add button ) clicked----  
  $(document).ready(function(){
    $('#submit').click(function(e){
          e.preventDefault();
        
          var product_number = $('#product_number').val();
          var product_name = $('#product_name').val();
          var product_desc = $('#product_desc').val();
          var product_cat = $('#product_cat').val();
          var product_status = $('#product_status').val();
          $('.form-add')[0].reset();
          //alert(product_number);
          $.ajax({

            method:"POST",
            url:'<?=base_url()?>ProductController/save_products',
            data:{product_number:product_number,
            product_name:product_name,
            product_desc:product_desc,
            product_cat:product_cat,
            product_status:product_status},
            dataType: 'json',
            success: function(response){
              if(response.message === "inserted"){ 
              $('.product-row').html("");
              loadProductDetails();
              $('.add-form').hide();
              alert("inserted succesfully");
              }
              else{
                alert("not inserted");
              }
            },
            error: function(){
              alert("something went wrong not inserted");
            }

          });
    });
  });  
    

    
</script>