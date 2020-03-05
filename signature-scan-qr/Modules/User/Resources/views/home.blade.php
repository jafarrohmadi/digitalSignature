@extends('user::layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="ri2-table ri2-fullwidth ri2-fullheight ri2-relative">
                        <div class="ri2-cell ri2-center ri2-vmid ri2-boxpad20 ri2-box">
                            <div class="modaltambahkaryawanback ri2-modal-back ri2-absolute ri2-fullwidth ri2-fullheight"></div>
                            <div class="ri2-modal-content ri2-relative new-largemodal-content">
                                <div class="ri2-modal-body ri2-block ri2-relative ri2-bgwhite1 ri2-marginbottom15 ri2-borderradius2 ri2-overflowhidden">
                                    <div class="ri2-block ri2-relative ri2-left new-blackoutgradient ri2-txwhite1 ri2-font20 ri2-boxpad10 ri2-box">
                                        Create
                                    </div>
                                    <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                                        <div class="ri2-table ri2-relative ri2-fullwidth ri2-cell-end2">
                                            <div class="ri2-cell ri2-vtop ri2-halfwidth ri2-paddingright40 ri2-cell-end2 ri2-mobilenopadding ri2-mobilemarginbottom20">
                                                
                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        Nama Customer
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <select class="basic-single ri2-block ri2-relative ri2-input40 ri2-input-greyholder ri2-box ri2-bgwhite4 ri2-fullwidth" name="select">
                                                            <option value="" selected disabled>Cari nama customer</option>
                                                            <option value="Budi">Budi</option>
                                                            <option value="Ani">Ani</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        Nama Work Order
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <input type="text" name="" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14" placeholder="Ketik Nama WO">
                                                    </div>
                                                </div>

                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        Alamat Customer
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <input type="text" name="alamat_customer" value="Jl Dummy" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14" disabled>
                                                    </div>
                                                </div>

                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        PIC
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <input type="text" name="pic" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14" placeholder="Ketik Nama Pic">
                                                    </div>
                                                </div>

                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        No. Telepon
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <input type="text" name="no_telepon" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14" placeholder="Ketik No. Telepon">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ri2-cell new-largemodal-right ri2-vtop ri2-halfwidth ri2-paddingleft40 ri2-cell-end2 ri2-mobilenopadding">
                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        Status Work Order
                                                    </div>
                                                    <div class="ri2-inlineblock ri2-fullwidth ri2-relative ri2-radio">
                                                        <label class="ri2-floatleft ri2-relative radio ri2-pointer">
                                                            <input type="radio" checked="checked" value="2" name="status_wo">
                                                            <span class="radio-text">Regular</span>
                                                            <span class="ri2-absolute ri2-circle radio-checkmark"></span>
                                                        </label>
                                                        <label class="ri2-floatleft ri2-relative radio ri2-pointer">
                                                            <input type="radio" name="status_wo" value="1">
                                                            <span class="radio-text">Urgent</span>
                                                            <span class="ri2-absolute ri2-circle radio-checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Detail Work Order</h4>
                                        <div class="ri2-table ri2-relative ri2-fullwidth ri2-cell-end2">
                                            <div class="ri2-cell ri2-vtop ri2-halfwidth ri2-paddingright40 ri2-cell-end2 ri2-mobilenopadding ri2-mobilemarginbottom20">
                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        Nomor Sales Order
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <input type="text" name="nomor_sales_order" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14">
                                                    </div>
                                                </div>
                                                
                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                    Lokasi Install
                                                    </div>
                                                    <div class="ri2-inlineblock ri2-fullwidth ri2-relative ri2-radio">
                                                        <label class="ri2-floatleft ri2-relative radio ri2-pointer">
                                                            <input type="radio" checked="checked" name="lokasi_install" value="1">
                                                            <span class="radio-text">Warehouse</span>
                                                            <span class="ri2-absolute ri2-circle radio-checkmark"></span>
                                                        </label>
                                                        <label class="ri2-floatleft ri2-relative radio ri2-pointer">
                                                            <input type="radio" name="lokasi_install" value="2">
                                                            <span class="radio-text">Customer</span>
                                                            <span class="ri2-absolute ri2-circle radio-checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="ri2-cell new-largemodal-right ri2-vtop ri2-halfwidth ri2-paddingleft40 ri2-cell-end2 ri2-mobilenopadding">
                                                <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                                    <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                        Tanggal Sales Order
                                                    </div>
                                                    <div class="ri2-block ri2-relative">
                                                        <input type="date" name="tanggal_sales_order" name="tanggal_sales_order" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                            <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                Activity Work Order :
                                            </div>
                                            <div class="ri2-block ri2-relative">
                                                <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-shadow"></div>
                                                <div class="ri2-absolute ri2-fullwidth ri2-fullheight ri2-bgwhite1 new-content-box-white"></div>
                                                <div class="ri2-block ri2-relative ri2-boxpad40 ri2-mobileboxpad20 ri2-box">
                                                <div class="ri2-block ri2-relative ri2-overflowauto ri2-paddingbottom20" data-simplebar data-simplebar-auto-hide="false">
                                                <table class="display datatable-table" style="width:100%;" border="1">
                                                    <thead>
                                                        <tr>
                                                            <th class="fit">No</th>
                                                            <th>Activity</th>
                                                            <th>Qty</th>
                                                            <th>Satuan pcs/lot</th>
                                                            <th>Description</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Install OS Windows Notebook HP Z250</td>
                                                            <td>100</td>
                                                            <td>-</td>
                                                            <td>Win 10 Pro</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                            <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                Expectation Date
                                            </div>
                                            <div class="ri2-block ri2-relative">
                                                <input type="date" name="expectation_date" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderwhite5 ri2-input-greyholder ri2-font14">
                                            </div>
                                        </div>

                                        <div class="ri2-block ri2-relative ri2-marginbottom20 ri2-left">
                                            <div class="ri2-block ri2-relative ri2-marginbottom5 ri2-font14 ri2-txgrey1 ri2-semibold">
                                                Note
                                            </div>
                                            <div class="ri2-block ri2-relative">
                                                <input type="text" name="note" class="ri2-input40 ri2-paddingleft10 ri2-paddingright10 ri2-box ri2-bgwhite2 ri2-borderradius2 ri2-borderfull1 ri2-borderwhite5 ri2-fullwidth ri2-input-greyholder ri2-font14" placeholder="Ketik Catatan...">
                                            </div>
                                        </div>

                                        <div class="ri2-block ri2-relative ri2-right">
                                            <button class="noty-button modaltambahkaryawanclose ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">Cancel</button>
                                            <button class="noty-button modaltambahkaryawanclose ri2-inlineblock ri2-bordernone ri2-borderradius2 ri2-boxpad7 ri2-paddingright15 ri2-paddingleft15 ri2-bgblue1 ri2-txwhite1 ri2-hovering ri2-font16 ri2-semibold ri2-pointer">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
