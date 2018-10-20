<div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Update Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div id="customer_success"></div>
                               <div class="card-body card-block" id="customer_form">
                                   <form method="post" enctype="multipart/form-data" class="form-horizontal" id="update_customer_form">
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Name</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="name-input-u" name="name-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your name</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="email-input" class=" form-control-label">Email</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="email" id="email-input-u" name="email-input-u" placeholder="Enter Email" class="form-control">
                                               <small class="help-block form-text">Please enter your email</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Telephone No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="tel-input-u" name="tel-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your telephone number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Cell No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="cell-input-u" name="cell-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your cell number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Residential Address</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="residential-input-u" id="residential-input-u" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Postal Address</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="postal-input-u" id="postal-input-u" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Multichoice No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="multichoice-input-u" name="multichoice-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your multichoice account number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">SABC License No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="sabc-input-u" name="sabc-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your SABC license number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label class=" form-control-label">Payment Method</label>
                                           </div>
                                           <div class="col col-md-9">
                                               <div class="form-check">
                                                   <div class="radio">
                                                       <label for="radio1" class="form-check-label ">
                                                           <input type="radio" id="radio1-u" name="payment-input-u" value="cash" class="form-check-input" checked>Cash
                                                       </label>
                                                   </div>
                                                   <div class="radio">
                                                       <label for="radio2" class="form-check-label ">
                                                           <input type="radio" id="radio2-u" name="payment-input-u" value="card" class="form-check-input">Card
                                                       </label>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-footer">
                                           <button type="submit" name="insert-u" id="insert-u" value="Update" class="btn btn-primary btn-sm">
                                               <i class="fa fa-dot-circle-o"></i> Update
                                           </button>
                                       </div>
                                   </form>
                               </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>