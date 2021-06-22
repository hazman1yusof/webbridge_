@extends('landing')

@section('title', 'Confirm Episode')

@section('body')
	
	<script type="text/javascript">
		function closeWindow() {
	        window.open('','_parent','');
	        window.close();
	    }
		var episode = {!! json_encode($episode) !!}
	</script>

	<form class="form-horizontal" id="episode_form" style="padding: 1em 3em 1em 3em">
            <div class="modal-content">
                <div class="modal-header label-warning">
                    <!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->
                    <div class="form-group has-error">
                        <div class="col-sm-2">
                            <small for="txt_epis_no">EPISODE NO:</small>
                            <input class="form-control " id="txt_epis_no" placeholder="" type="text" name="episno" readonly>
                            <!--                                    <small class="help-block text-center">REGISTRATION MRN</small>-->
                        </div>
                        <div class="col-sm-6">
                            <small for="txt_epis_type">TYPE: </small>
                            <div class="input-group">
                                <input id="txt_epis_type" placeholder="" type="text" class="form-control" style="width:50px;" readonly>
                                <span class="input-group-addon" style="background-color:transparent; border-color: transparent" style="width:40px;">&mdash;</span>
                                <select id="cmb_epis_case_maturity" name="cmb_epis_case_maturity" class="form-control form-mandatory" style="width:300px;">
                                    <option value="">- Select -</option>
                                    <option value="1">New Case</option>
                                    <option value="2">Follow Up</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <small for="txt_epis_date">DATE: </small>
                            <input class="form-control" id="txt_epis_date" name="reg_date" placeholder="" type="text" readonly>
                        </div>
                        <div class="col-sm-2">
                            <small for="txt_epis_time">TIME: </small>
                            <input class="form-control" id="txt_epis_time" name="reg_time" placeholder="" type="text" readonly>
                        </div>


                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs-left" role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tabEpisode" role="tab" data-toggle="tab" aria-expanded="true">Episode</a></li>
                                </ul>

                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade active in" id="tabEpisode">
                                        <!-- Tab content begin -->
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <small for="txt_epis_dept">Registration Department</small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" name="regdept" id="txt_epis_dept">
                                                    <input type="hidden" id="hid_epis_dept" value=""  />
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_epis_dept" data-toggle="modal" data-target="#mdl_item_selector" onclick="Global.pop_item_select('epis_dept');"><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>                                          
                                            <div class="col-md-10">
                                                <small for="txt_epis_source">Registration Source</small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" name="admsrccode"  id="txt_epis_source">
                                                    <input type="hidden" id="hid_epis_source" value="" />
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_epis_source" data-toggle="modal" data-target="#mdl_item_selector" onclick="Global.pop_item_select('epis_source');"><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <small for="txt_epis_case">Case </small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" name="case_code" id="txt_epis_case">
                                                    <input type="hidden" id="hid_epis_case" value="" />
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_epis_case" data-toggle="modal" data-target="#mdl_item_selector" onclick="Global.pop_item_select('epis_case');"><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <small for="txt_epis_doctor">Doctor</small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" name="admdoctor" id="txt_epis_doctor">
                                                    <input type="hidden" id="hid_epis_doctor" value="" />
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_epis_doctor" data-toggle="modal" data-target="#mdl_item_selector" onclick="Global.pop_item_select('epis_doctor');"><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <small for="txt_epis_fin">Financial Class</small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" name="pay_type"  id="txt_epis_fin" name="txt_epis_fin">
                                                    <input type="hidden" id="hid_epis_fin" value="" />
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_epis_fin" data-toggle="modal" data-target="#mdl_item_selector" onclick="Global.pop_item_select('epis_fin');"><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <small for="cmb_epis_pay_mode">Pay Mode </small>
                                                <select id="cmb_epis_pay_mode" name="pyrmode" class="form-control">
                                                    <option value="">- Select Pay Mode -</option>
                                                    <option value='CASH'>Cash</option>
                                                    <option value='CARD'>Card</option>
                                                    <option value='WAITING GL'>Waiting GL</option>
                                                    <option value='OPEN CARD'>Open Card</option>
                                                    <option value='PWD'>Consultant Guarantee (PWD)</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <small for="txt_epis_payer">Payer </small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" id="txt_epis_payer">
                                                    <input type="hidden" id="hid_epis_payer" value="PURI" name=""/>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_epis_payer"><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <small for="txt_epis_bill_type">Bill Type </small>
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-mandatory" id="txt_epis_bill_type">
                                                    <input type="hidden" id="hid_epis_bill_type" value="STD" name="billtype"/>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_bill_type_info" ><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <small for="txt_epis_refno">Reference No</small>
                                                <div class="input-group">
                                                    <input id="txt_epis_refno" type="text" class="form-control form-mandatory" value="REF-123456789">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_refno_info" ><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <small for="txt_epis_our_refno">Our Reference No</small>
                                                <div class="input-group">
                                                    <input id="txt_epis_our_refno" type="text" class="form-control" value="OURREF-123456789" readonly>
                                                    <!--span class="input-group-btn">
                                                        <button type="button" class="btn btn-warning" id="btn_our_refno_info" ><span class="fa fa-ellipsis-h"></span> </button>
                                                    </span-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">                                        
                                            <div class="col-md-4">
                                                <small for="rad_epis_pregnancy">Status</small>
                                                <div class="panel panel-default">
                                                    <div class="panel-body checkbox">
                                                        <small class="checkbox checkbox-inline"><input type="radio" value="1" name="rad_epis_pregnancy" id="rad_epis_pregnancy_yes">Pregnant</small>
                                                        <small class="checkbox checkbox-inline"><input type="radio" value="0" name="rad_epis_pregnancy" id="rad_epis_pregnancy_no">Non Pregnant</small>
                                                    </div>
                                                </div>
                                            </div>                                     
                                            <div class="col-md-4">
                                                <small for="rad_epis_fee">Admin Fee</small>
                                                <div class="panel panel-default">
                                                    <div class="panel-body checkbox">
                                                        <small class="radio radio-inline"><input type="radio" value="1" name="rad_epis_fee" id="rad_epis_fee_yes" checked>Yes</small>
                                                        <small class="radio radio-inline"><input type="radio" value="0" name="rad_epis_fee" id="rad_epis_fee_no">No</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <small for="txt_epis_queno">Queue No</small>
                                                <input id="txt_epis_queno"  type="text" class="form-control">
                                            </div>
                                        </div>                                       

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tabDoctor">
                                        <!-- Tab content begin -->
                                        <p>Development mode</p>
                                        <!-- Tab content end -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tabBed">
                                        <!-- Tab content begin -->
                                        <p>Development mode</p>
                                        <!-- Tab content end -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tabNext">
                                        <!-- Tab content begin -->
                                        <p>Development mode</p>
                                        <!-- Tab content end -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tabPayer">
                                        <!-- Tab content begin -->
                                        <p>Development mode</p>
                                        <!-- Tab content end -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tabDeposit">
                                        <!-- Tab content begin -->
                                        <p>Development mode</p>
                                        <!-- Tab content end -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button id="epis_confirm_button" type="button" class="btn btn-default" data-dismiss="modal">Confirm</button>
                </div>
            </div>
        </form>

@endsection

@section('script')
	<script type="text/javascript" src="js/episode.js"></script>
@endsection