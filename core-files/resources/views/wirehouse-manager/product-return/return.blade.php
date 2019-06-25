@extends('layouts.wirehouse-admin')

@section('content')
    <div class="white-box">
        <div class="col-mod-12">
            <div class="col-mod-6 col-lg-6">
                <h3 class="box-title m-b-0">Product Requisition</h3>
                <p class="text-muted m-b-30">add new requisition</p>
            </div>
            <div class="col-mod-6 col-lg-6 ">
                <a href="{{ route('wirehouse.product-demands') }}" class="waves-effect pull-right"><button class="btn btn-xs btn-info "><i class="fa fa-list"></i> All Requisitions</button></a>
            </div>
        </div>
        <div class="clear"></div><hr/>
        <div class="panel-body">
            <form action="{{ route('wirehouse.update-return-requisition',['id' => $product_demand->id]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" style="margin-top: 25px;">
                                <label class="control-label">Requisition Type</label>
                                <p>{{ $product_demand->demand_type == 1 ? 'Product' : 'Product Set' }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Requisition To</label>
                                <p>{{ $product_demand->toWireHouse->name }}</p>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Products</label>
                                <p>{{ $product_demand->item->name }}</p>
                            </div>
                        </div>

                    </div>
                    <!--/row


                    -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Quantity</label>
                                <input type="text" id="firstName" class="form-control" name="quantity" value="{{ $product_demand->quantity }}"></div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Unit</label>
                                <p>{{ $product_demand->unit->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function(){

            $(document).on('change','input[name=demand_type]',function(){
                var url = "{{ route('wirehouse.item') }}/" + $(this).val();
                var type = $(this).val();
                $.ajax({url: url, success: function(result){
                        listingItems(result.items);
                    },
                    error:function(err){
                        alert(err);
                    }
                });
                function listingItems(items){
                    if(type == 1){
                        var output = '<option value="">--Select Product--</option>';
                    }else
                    {
                        var output = '<option value="">--Select Product Set--</option>';
                    }

                    for(var i = 0; i < items.length ; ++i){
                        output += '<option value="'+ items[i].id +'">'+ items[i].name +'</option>';
                    }
                    $('#proSet').html(output);
                }
            });

        });

    </script>


@endsection