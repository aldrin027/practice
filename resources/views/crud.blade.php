@extends('layouts.master')

<style>
    .data_table td {

        text-align: center;
        width: 80%;
        height: 35px;

    }

    .data_table td div.description {
        max-height: 100%;
        display: block;
        overflow-x: auto;
    }

    .data_table .tdHeader {
        font-weight: bold;
    }

    .data_table td img {
        max-width: 100%;
        height: auto;
    }
</style>
@section('content')
    <div class="row">

        <div class="myTable" style="height: 80%; position: absolute; width: 85%; left: 5%; top: 125px;">

            <button class="addButton btn-success" data-toggle="modal" data-target="#addModal">Add New Item</button>

            <table class="data_table table-bordered" style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr>
                        <td class="tdHeader">Image</td>
                        <td class="tdHeader">Description</td>
                        <td class="tdHeader">Quantity</td>
                        <td class="tdHeader">Price</td>
                        <td class="tdHeader">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="https://i.ytimg.com/vi/OvraaL6-Cio/maxresdefault.jpg" alt="" style="height: 100px;"/></td>
                        <td><div class="description">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</div></td>
                        <td>23</td>
                        <td>&#8369 50.00</td>
                        <td><button class="editButton btn-primary"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</button> &nbsp; &nbsp; <button class="deleteButton btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</button></td>
                    </tr>
                    <tr>
                        <td><img src="https://i.ytimg.com/vi/OvraaL6-Cio/maxresdefault.jpg" alt="" style="height: 100px;"/></td>
                        <td><div class="description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div></td>
                        <td>23</td>
                        <td>&#8369 50.00</td>
                        <td><button class="editButton btn-primary"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</button> &nbsp; &nbsp; <button class="deleteButton btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Start of Add Button Modal -->
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    {{--<p>One fine body&hellip;</p>--}}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::file('myImage', ['id' => 'itemImage']) !!}
                            <div class="image_holder">
                                <img id="img" style="max-width: 100%; max-height: 190px;" src="http://lostandfoundtravel.net/wp-content/themes/AiwazMag/images/no-img.png" alt=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--<div class="item_info" style="position: relative; max-width: 100%; max-height: 12%;">--}}
                                Description: {!! Form::textarea('description', null, ['id' => 'description', 'style' => 'max-width: 100%; max-height: 12%;', 'resize' => 'one']) !!}
                            <br/><br/>
                                Quantity: {!! Form::text('quantity', null, ['id' => 'qty', 'style' => 'width: 70px;']) !!}
                                &nbsp;
                                Price: &#8369 {!! Form::text('price',null, ['id' => 'prc', 'style' => 'width: 70px;']) !!}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancelButton" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Add Button Modal -->
@stop

@section('js')
    <script>
        var Crud = Crud || {
            vars: {},
            elems: {},
            fns: {
                showAddModal: function() {
                    $('#itemImage').on('change', function(e){
//                        console.log($('#img').src())
                        Crud.elems = {
                            imgSrc: e.originalEvent.srcElement.files[0],
                            desc: $('#description'),
                            qty: $('#qty'),
                            price: $('price')
                        };


                        var Form = new FormData();
                        Form.append('image', Crud.elems.imgSrc);
                        Form.append('description', Crud.elems.desc);
                        Form.append('quantity', Crud.elems.qty);
                        Form.append('price', Crud.elems.price);

                        var reader = new FileReader();

/** For multiple Upload Code **/
                        reader.onload = function (e) {
                            $('.image_holder').empty();
                            $("<img />", {
                                "src": e.target.result,
                                "class": 'image',
                                "style": 'max-width: 100%; max-height: 190px;'
                            }).appendTo('.image_holder');
                        };
/** End **/


                        reader.readAsDataURL($(this)[0].files[0]);
                    });
                }
            }
        };

        $(function(){
            Crud.fns.showAddModal();

            $('#cancelButton').on('click', function(){
                $('.image_holder').empty();
                $("<img />", {
                    "src": 'http://lostandfoundtravel.net/wp-content/themes/AiwazMag/images/no-img.png',
                    "class": 'image',
                    "style": 'max-width: 100%; max-height: 190px;'
                }).appendTo('.image_holder');
//
            });

        });
    </script>
@stop