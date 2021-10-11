@extends('./layout_master')
@section('admin')
<div class="content-page center">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6 p-2">
                              <h5>Customer Select <span class="text-danger">*</span></h5>
                              <div class="input-group">
                                 <select class="form-control select2" id="customer_id" name="customer_id"  style="width: 100%;"  >
                                    {{-- <option  value='1'>Walk-in customer</option>
                                    <option  value='7'>Vinit Hiremath</option>  
                                    <option  value='1'>Walk-in customer</option>
                                    <option  value='7'>Vinit Hiremath</option>                                                         --}}
                                 </select>
                                <span class="input-group-addon pointer" data-toggle="modal" data-target="#customer-modal" title="New Customer?">

                                </span>
                              </div>
                                <span class="customer_points text-success" style="display: none;"></span>
                            </div>
                            <div class="col-md-6 p-2">
                              <h5>Customer Items <span class="text-danger">*</span></h5>
                              <div class="input-group">
                                <span class="input-group-addon" title="Select Items"></span>
                                 <input type="text" class="form-control" placeholder="Item name/Barcode/Itemcode" id="item_search">
                              </div>
                            </div> 
                        </div>
                    </div>

            {{-- ///body///// --}}
            <div class="col-sm-12" style="overflow-y: auto; border: 1px solid rgb(51, 122, 183); height: 530px;">
                <table class="table table-condensed table-bordered table-striped table-responsive items_table" style="">
                  <thead class="bg-primary">
                    <tr><th width="30%" class="text-light">Item Name</th>
                    <th width="10%" class="text-light">Stock</th>
                    <th width="25%" class="text-light">Quantity</th>
                    <th width="15%" class="text-light">Price</th>
                    <th width="10%" class="text-light">Discount</th>
                    <th width="10%" class="text-light">Tax</th>
                    <th width="15%" class="text-light">Subtotal</th>
                    <th width="5%" class="text-light">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </th>
                  </tr></thead>
                  <tbody id="pos-form-tbody" style="font-size: 16px;font-weight: bold;overflow: scroll;">   </tbody>        
                  <tfoot>
               
                    <!-- footer code -->
                  </tfoot>              
                </table>
              </div>



            {{-- /////end --}}
            {{-- //////check --}}

            <div class="row">
            <div class="col-md-7 p-2">
                <div class="checkbox icheck">
                   <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                    <input type="checkbox" checked="" class="form-control" id="send_sms" name="send_sms" 
                    style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                    </ins>
                  </div> 
                  <label for="sales_discount" class=" control-label">
                    <label for="send_sms">Send SMS to Customer</label>
                     <i class="hover-q " data-container="body" data-toggle="popover" data-placement="top" 
                        data-content="If checkbox is Disabled! You need to enable it from SMS -> SMS API <br><b>Note:<i>Walk-in Customer will not receive SMS!</i></b>"
                      data-html="true" data-trigger="hover" data-original-title="Do you wants to send SMS ?" title="">
                       <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                     </i>
                   </label>
               </div>
             </div>
             <div class="col-sm-5 p-2">
              Other Charges*<input type="text" class="form-control text-right" id="other_charges" name="other_charges" placeholder="0.00" value="">
                <span id="other_charges_msg" style="display:none" class="text-danger">Other Charges*</span>
              </div>
            </div>
            {{-- ////end --}}
              
                        <div class="row">
                          <div class="col-md-3 text-right p-2">
                                  <label> Quantity:</label><br>
                                  ৳ <span style="font-size: 19px;" class="tot_amt text-bold">16687.00</span> 
                          </div>
                          <div class="col-md-3 text-right p-2">
                                  <label>Total Amount:</label><br>
                                  ৳ <span style="font-size: 19px;" class="tot_amt text-bold">16687.00</span>  </div>
                          <div class="col-md-3 text-right p-2">
                                  <label>Total Discount:<a class="fa fa-pencil-square-o cursor-pointer" data-toggle="modal" data-target="#discount-modal"></a></label><br>
                                  ৳  <span style="font-size: 19px;" class="tot_disc text-bold">05645.00</span>  </div>
                          <div class="col-md-3 text-right p-2">
                                  <label>Grand Total:</label><br>
                                  ৳ <span style="font-size: 19px;" class="tot_grand text-bold">16687.00</span> </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-3">
                                    <button type="button" id="" name="" class="btn btn-danger btn-block btn-flat btn-lg show_payments_modal" >
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                       Hold
                                      </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" id="" name="" class="btn btn-info btn-block btn-flat btn-lg show_payments_modal" >
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                         Multiple
                                      </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" id="" name="" class="btn btn-success btn-block btn-flat btn-lg show_payments_modal" >
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                         Cash
                                      </button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button" id="" name="" class="btn btn-primary btn-block btn-flat btn-lg show_payments_modal" >
                                        <i class="fa fa-credit-card" aria-hidden="true"></i>
                                         Pay All
                                      </button>
                                </div>

                         

                        </div>
                       
                   
                </div><!-- end col-->

                <div class="col-6 p-1 ">
                    <div class="row p-1">
                        <div class="col-md-6">
                          <h5>Category Select <span class="text-danger">*</span></h5>
                          <select class="form-control select2" id="categorySelect" name="category_id"  style="width: 100%;"  >
                           
                            <option disabled selected>Select Category</option>
                            <option value="all">All Product</option>
                            @foreach($categorys as $category)
                           
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                   @endforeach
                               </select>
                        </div> 

                        <div class="col-md-6">
                          <h5>Filter Items <span class="text-danger">*</span></h5>
                          <div class="input-group input-group-md">
                          
                              <input type="text" id="search_it" class="form-control" placeholder="Filter Items" autocomplete="off">
                                  <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat show_all">All</button>
                                  </span>
                            </div>
                        </div>                
                      </div>
                      <div class="p-1">
                      <div class="row   " id="showProduct"  style="padding-left:5px;padding-right:5px;">
                        
                      </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
