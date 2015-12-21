@extends('layouts.master')

@section('css')
    <style>
        .chatToggle {
            position: absolute;
            float: left;
            /*right: 0;*/
        }

        .reportGrid {
            position: relative;
            /*width: 960px;*/
            max-width: 100%;
            height: 90%;
            margin: 0 auto;
            /*top: 125px;*/
            /*left: 455px;*/
        }
        .msgarea {
            position: absolute;
            resize: none;
            width: 250px;
            right: 0px;
            top: -205px;
            overflow: auto;
            background-color: #ffffff;
            text-wrap: normal;
        }
        .textInput {
            position: absolute;
            width: 250px;
            top: -25px;
        }

        .footer {
            position: relative;
            width: 100%;
            height:98px;
            background: gray;
        }
        .report {
            max-width: 100%;
            position: absolute;
        }
    </style>
@stop
@section('content')
    @include('navbar.menus')
    <div class="reportGrid">
        <table id="report">
            <div id="toolbars">
                <button class="btn btn-primary" onclick="Bots.func.add()">Add</button> &nbsp;
                <button class="btn btn-primary" onclick="Bots.func.delete()">Delete</button>
            </div>
        </table>
    </div>

@stop
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                Data
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<button id="click">Click me!</button>
@section('js')
    <script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-detailview.js"></script>
    <script>
        $(document).ajaxComplete(function(event, xhr, settings){
            settings.contentType = false;
            settings.crossDomain = true;
            settings.processData = false;

            if(xhr.error)
            {
//                $.alert.messager('Error', xhr.description);
            }
        });

        $.ajaxPrefilter(function(options, originalOptions, jqXHR){

        });

        var conn = new WebSocket('ws://127.0.0.1:8080');
        var message;
        conn.onopen = function(e) {
//            console.log('established!')
        };


        conn.onmessage = function(e)
        {
            message = $.parseJSON(e.data);

        };

        $.extend($.fn.datagrid.defaults.editors, {
            text: {
                init: function(container, options){
                    var input = $('<input type="text" class="datagrid-editable-input">').appendTo(container);
                    return input;
                },
                destroy: function(target){
                    $(target).remove();
                },
                getValue: function(target){
                    return $(target).val();
                },
                setValue: function(target, value){
                    $(target).val(value);
                },
                resize: function(target, width){
                    $(target)._outerWidth(width);
                }
            }
        });


        var Bots = Bots || {
                    vars: {
                        action: "",
                        selectedData: 0
                    },
                    elements: {
                        datagrid : $('#report')
                    },
                    func: {
                        add: function() {
                            if(Bots.vars.action == '') {
                                Bots.vars.action = 'add';
                                Bots.elements.datagrid.datagrid('insertRow', {
                                    index: 0,
                                    row: {
                                        botname: '',
                                        displayname: '',
                                        activate: '',
                                        availability: ''
                                    }
                                }).datagrid('beginEdit', 0);
                            }else{
                                $.messager.alert('Warning', "Please finish " + Bots.vars.action + " function first!");
                            }
                        },
                        delete: function(BotID) {

                            if(Bots.vars.action == '') {
                                $.messager.confirm('Delete', 'Are you sure you want to delete this record?', function(r) {
                                    if(r){
                                        var rowIndex = $('#report').datagrid('getRowIndex', BotID);
                                        $('#report').datagrid('refreshRow', rowIndex).datagrid('deleteRow', rowIndex);
//                                        $.messager.alert('Success', 'Data Deleted!');
                                    }
                                });

                            }else{
                                $.messager.alert('Warning', "Please finish " + Bots.vars.action + " function first!");
                            }

                        },
                        edit: function (BotID) {
                            if(Bots.vars.action == '')
                            {
                                var DG = Bots.elements.datagrid;
                                Bots.vars.action = 'edit';
                                var rowIndex = $('#report').datagrid('getRowIndex', BotID);
                                Bots.vars.selectedData = rowIndex;

                                DG.datagrid('beginEdit', rowIndex);

                            }else{
                                $.messager.alert('Warning', "Please finish " + Bots.vars.action + " function first!");
                            }


                        },
                        cancel: function (BotID) {
                            var DG = Bots.elements.datagrid;

                            var rowIndex = $('#report').datagrid('getRowIndex', BotID);

                            DG.datagrid('cancelEdit', rowIndex);
                            Bots.vars.action = '';

                        },
                        save: function() {
                            if(Bots.vars.action == 'edit')
                            {

                            }
                        }
                    }
                };

        function triggerMe(firstMessage, secondMessage, callback) {
            var mess;
            mess = 'This is the first message: ' + firstMessage + '\n';
            mess += 'This is the second message: ' + secondMessage + '\n';

            if(callback && typeof callback === 'function')
            {
                mess += 'This is the function callback: ' + callback();
            }

            return alert(mess);
        }


        var OOP = OOP || {
                    fn: {
                        triggerHim: function(a,b,c) {

                            if(typeof c === 'function') {
                                c = c();
                            }else if(c === ''){
                                c = null;
                            }
                            return console.log(a + ' ' + b + ' ' + c);
                        }
                    }
                };


        $(function(){

//            $('#click').on('click', function(){
//                triggerMe('Hello', 'World', function(){
//                    return 'ALDRIN!!!';
//                });
//            });

            $('#click').on('click', function(){
                OOP.fn.triggerHim('a','b', function(){
                    return 'c';
                });
            });


            var url = '{!! Request::url() !!}';
            var curr = window.location.href;
            var currPath = curr.substr(0, 49);
            var parsed = JSON.parse('{!! $data !!}');
            var chatTab = $('#chatTab');
            chatTab.on('click', function (e) {
                $('#msgarea').toggle();
                $('#txtInput').toggle();
                $(this).parent().find('#arrow').toggleClass('glyphicon glyphicon-menu-down glyphicon glyphicon-menu-up');
            });
            $('#txtInput').keypress(function(e){
                var enter = e.which ? e.which : e.keyCode;
                if(enter == 13)
                {
                    message = $(this).val() + "\n";
                    $('#msgarea').append(message);
                    conn.send(message);
                    $(this).val("");
                }
            });


            $('#report').datagrid({
                url: currPath + 'dashboards',
                method: 'GET',
                title: "Get on with IT!",
                toolbar: '#toolbars',
                pagination: true,
                sortable: true,
                data: parsed,
                striped: true,
                idField: 'bot_id',
                checkOnSelect: true,
                fitColumns: true,
                fit: true,
                columns: [[
//                    {field: 'view', title: '', width: 35, formatter: function(i, v){
//                        return '<button id="View'+ v.bot_id +'" class="view viewglyphicon glyphicon-plus"></button>';
//                    }},
                    {field: 'checkbox', checkbox: true, formatter: function(i, v){
                        console.log(i + "   " + v)
                    }},
                    {field: 'botname', title: 'Bot Names', width: 200, editor: 'text', sortable: true, formatter: function (i, v) {
                        return '<div>' + v.botname + '</div>';
                    }},
                    {field: 'displayname', title: 'Display Names', width: 200, editor: 'text', sortable: true, formatter: function(i , v){
//                        var a = '{"botID":'+ v.bot_id+',"BotName":'+ v.botname+'"Active":'+ v.active+'"Availability":'+ v.availability+'}';

                        var dataInfo = [v.bot_id, v.botname, v.displayname, v.activate, v.availability];
                         return '<div> <a href="javascript:void(0)" id="name_details'+v.bot_id +'" class="details" data-toggle="modal" data-target="#myModal" data-bots="'+ dataInfo +'">'+ v.displayname+'</a></div>';
                    }},
                    {field: 'activate', title: 'Activate', width: 200, editor: 'text', sortable: true,  formatter: function(i, v) {
                        return '<div>' + v.activate + '</div>';
                    }},
                    {field: 'availability', title: 'Availability', width: 200, editor: 'text', sortable: true,  formatter: function(i , v) {
                        return '<div>' + v.availability + '</div>';
                    }},
                    {field: 'action', title: 'Actions', width: 150, formatter: function(value, row, index) {

                        if(row.editing)
                        {
                            return '<div style="width: 50%;"><button class="btn btn-primary btn-xs btn-responsive glyphicon glyphicon-floppy-saved" style="max-width: 100%;" onclick="Bots.func.save()" >Save</button> &nbsp; &nbsp; <button class="btn btn-primary btn-xs glyphicon glyphicon-remove-sign" style="max-width: 100%;" onclick="Bots.func.cancel('+ row.bot_id +')">Cancel</button></div>';
                        }else{

                            return '<div style="width: 50%;"> <button class="btn btn-primary btn-xs btn-responsive glyphicon glyphicon-edit" style="max-width: 100%;" onclick="Bots.func.edit(' + row.bot_id + ')" >Edit</button> &nbsp; &nbsp; <button class="btn btn-primary btn-xs glyphicon glyphicon-remove-sign" style="max-width: 100%;" onclick="Bots.func.delete('+ row.bot_id +')">Delete</button></div>';
                        }

                    }}
                ]],
                onBeforeEdit: function(index, row) {
                    row.editing = true;
//                    console.log(Bots.vars.action)
                    $('#report').datagrid('refreshRow', index);
                },
                onBeginEdit: function(index, row) {
                    Bots.vars.selectedData = index;
                },
                onAfterEdit: function(index, row) {
//                    console.log(index)
                },
                onCancelEdit: function(index, row)
                {
                    row.editing = false;
                    Bots.vars.action = '';
                    $('#report').datagrid('refreshRow', index);
//                    $('#report').datagrid('unselectRow', index);
                }
//                onSelect: function(index, row){
//                    if(Bots.vars.selectedData == index)
//                    {
//                        $('#report').datagrid('selectRow', index);
//                    }else{
//                        $('#report').datagrid('unselectRow', index);
//                    }
//                }
            });



            $('.view').on('click', function(){
                $(this).toggleClass('view viewglyphicon glyphicon-minus', 'view glyphicon glyphicon-plus')

            });

            $('.details').on('click', function(){
                var show = $(this).data('bots');
                var data = show.split(",");
//                var data = show.replace(/,/g, "<br>");

                var table = "<div id='userInfo'>" +
                                "<div class='row'>" +
                                    "<div class='col-md-12'>"+
                                        "<div class='col-md-6' style='width: 200px; height: 210px;'>" +
                                            "<img src='data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxQTEhUUExQWFhUXGR0bGRgXGBocHBogGh4cHR0fGB0dHCggHR0lHBwdIjEiJSkrLi4wHB8zODMsNygtLisBCgoKDg0OGxAQGzQmICQsLDQsLC8sLCwsLC8sLC0sLCwsLCwsLCwsLiwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLP/AABEIAQsAvQMBEQACEQEDEQH/xAAcAAACAwEBAQEAAAAAAAAAAAAFBgMEBwIBAAj/xABFEAACAQEGBAQDBAgFAwIHAAABAhEDAAQFEiExBkFRYRMicYEykaEjQrHBFFJicpLR4fAHM4Ky8RUkQ1OiFmNzk6Oz0v/EABoBAAIDAQEAAAAAAAAAAAAAAAMEAQIFAAb/xAA7EQABAwEFBgYBBAICAAYDAAABAAIRAwQSITFBUWFxkaHwEyKBscHR4QUyQvEUI1KyFWKCosLyBjNy/9oADAMBAAIRAxEAPwBwxDiPwrx4JgBchJiSRDO+sxouX52uoQ/D+I71WeiqEEksXUKuUpmBMncBVMAjcjnblykq49eXoM9Koqmndqbv5QZd2O0ggHKPTU6W5curziNdrwqM6tTFX9HK5QGdxTzPU7KGjSYg+9uXIXjqOlWoKQEARHfqO8cu1pXLP0vxWu6mRJG/Mrod9tBt2Nj0n3HB2xXaYMozimHsxNeioKVJZmG4Y/ECPWSO3vb0DbtSC3sadMDvWqxt9t5vqjHCYZF0cgROvL52LWY26ARKZpjCFPxVjWWguUgg6QJg/wB+9qUadxxeRipeQ0SEgU7p45kCO1rOZ4hlKkXsVa4mApXSjTiGZmeO3lA+qmyv6i4Bl3gOUk+4Q7XAAbuS7QvEi2ERis4hT+P0tEKFFWa1VCrXjNE8hblyq1LwxEfIW4rlau9NmrVPKTD6juZn8DZlkl7o2ookkphu9zIoVWaQfDYD5WZeIpGUUt8pKZ+DLzluayAdW3J2BPbtYFFvllTQb5JSBeLwzqqkaIIEchJP4n62WgpXFVjQJWbRChU6tKGA1twGK5F8KureLTy5gpmRqAYH/FmRRdAwRLi0Gvw3d6YTxUZnZQTDAAdAPKeWvvbUoWFjhll3tC0KdjZdBcc1qN6wSjULF0ksSSSTPmRUMdJVQLefWUuL3gFJznBZKgJKup1UksSddCDmgg6EQLcuUFz4eo0KFRcsmoqioFZgGKzGUEkrqTpNuXILVvN2FepXykM2pbUqDpmidATAk87SuQO93rNXzzmSZymPmYsSmQHC9kpETiveIeHLvXiqKhpqQIJ1AjuNZB11HTrbTbZm1NMd30ftaTbIKjbzSq9wpUbmjObwXY6Mq6KT3kaj1G1mqVDw8NNp+ANfVEpUBSxLuSXquO1LzUcUgqKwAgaDQiCBO/P3Nmqbr0BumpzRjVNQwOqF3vOWVM2cKFkjUCe/vvYmN4AqhmYTlQwWnd6P6Q9VTT3gCGOkws7/AEjewX2kNJbEEa6DvqiOcyli7YkHHb618qu8qqqBlHQDQD0gb2xa1TxXbh31WU95qOLiglJoaO9lihFGbpdgxAG/Xp/YtQqpXd/pUqRg1FdzsiwT6etoUIVfb0XkZcgA1B69LQuUV3usjMJ0PPT6W5cnnhS7oqMz7vUAB5+VJPzmPex6ZLRxRmG62dqK8R0UajVVAJiJ5CSBEczrNmak3DKZrfsKq4bdvDuEEeYqRoTu5MRtyYG1GyKcKjTdo96parXML/etqXEC6p7tc/LaWsUhqpU8KNW+JTA+LL+MWJZ6IdVxyGJ4BWpsl8LQMIv9N754IRDQCGPIs7qoOaJmNd7btZhbS/8ANxMcIyWyabD/AKwMhnvRnHbizMuXkMvuvl/KfcWFZaoaDPc4q1Nt9kDSftaBezqP72t5ghefeFHn0tVDS1j18qDyBTmfcxIjbTlawClUayqqg1fP0BEAdSBz3525Qlupg0pVvVKBTk+QaD1Xl7WO2jLZlEFMlt5ALvxKaYyMA1Nj5lY8+umo9fx1sxZrSaWf9d7EajWdTyVm/JdqyE0rx4bfq1AYHoQpn5C2o2vTq68vox7pvxqTxsPfeqG3a5Krl615u7LlgDznXSJ8s6CxKZY10udI9PkrmPaDLjgitC9XClmcHO0aqA2U8xudp6BfWwqttYybp+T9e6s+1U2/tGPemSH4ve6t8XztkgxTpAAEgxEDp/U2ynVH1nXRrp9pB9R1R2KXcRur3dzSchGU+YwPUa897UqMNMwVVwumCrWB8H3u+NnoqBTk/a1DC6HWB8R9hYBKoSi1y4ZKFkrsWdWIZQSoBEdDOsyDzEHnbiNVBCJ/o13oUmJVKYkfDpOsbjU6/Pa1SoS5WuOYyEKI5HlPx1IM6j7q9tzPK0LlZ/6YiMlNmyjSTHJvxixqDA94aVZgkwUSvmF1aFSjTzBkLLlcbEFgzHUSDECDGgHWzVazlhbGXUcUw+kWuaNFNiNcQ0A6t9FH5kj5WtWyAV6xkQERxS/KadGmvIAn0UZR+fyFhubdddUVRdIagN9QMDaxGCpCgpnL5SdhztI2LkRNMXeibwT9o6FKY9ZDN8jHqf2TbWsdG7iRsJ+B6nE7hvT9npXR4h72ff8AaF8NXoreF6tI1+f5WbMnAorHEOWl3rGKVByKskOFZY5aZT88otkvi6MYOPvPyqVaxpPICYcfxkUiinc9dh3MTbJLMFm1WoDi3EjZ/s2hQNNtSRudPpaG00INVG747mUl2JI56kmPa0uZC4tS3jnEDg+WBOxI1+UmP72tDWrgE10K/wD2SUxBZ6ZIB3LHU/TbvbWFDkMOn2tQUJoSFjuOU2FYzuT1/Pa2a9haYKzS2Ffbh+8qMxp84hXHPpraAIXAIXe7nqzEMNdcylQY6E8/naHBQVDTvWUhXQlJkDZvbkR/W0A7Vy1z/D/ABeV/SHimx8tMMpbJHMAwCddOXys2x7aLQ+JJ3xh3mmaIazzkTumE1XDhNaV7q12PiFwMuYDyxOxiZjn2srXreIQY0QKz7zpX2JYpdLn5JRGYlhTprLuTqctNQWMzMxFgoSWMfu94vVYPQu5pDLld7wyrMHykJTLNsSNcpMLtFrNJCkGENxHh5EZJZq9bcmPKmWP8tB8PqZJ5m0RqVBChuVEBix8x3APLfb10+VuhQq2C4abzVao+iKZLn4R7/SzlloOLg4jDTej0KLnuEJ0q0qdWhVc7L/lzyIUj55QPkLPV7zSGn15/krXtQAbTA07+0jU3WvWYTCU9zt3/AN0+y2VGNSdnwkBDqs6Dv3VCtWJYnYcuw2H0sEkucXIDnXnEqK9V9NN4tc5LiveGkarVFMzmZlA6RrM+8R72mzSX45DE+imkC50Ixxo4LBV+BFhR6THz3Pcm3prMz/SScyt2q260M2e6UsIv0V6eYH4o+YI/OybLQXVA0jFIU6hNQNO1OPGF6msF/wDTUKfUDX6zbKtTsQBx5/iEC1vvVSQr+OXw1qjsobLPfblNqOaXDDIBCebxlTNw5Ve7h6TqS3vl9bd4bdDipFKWyFXp4QKNMvWrQToAoIEnb9Y6weU2A6TghHFKmJ0gTowB1PPl7etuDcFwCecMpPeKN3dKkFRl0UwGEntqARbZp1WtBkZgHp9ytmzOmmCNFxxBwQl4ZPPDsWzBSFkkCCoO2sEjlykWUrAVQSREa/f3zS1os96XNGHffuqOMVfAHhmJEAAHbLvZO4QYKQukGCrF1wmtTpiq5WKhnL6gST7cv7JqlJoaccQiPpQ2SgGKYYl4vKooBIyhcsaAb5uoH4AWXuiJKDGCeMLuyUGihKLMFUdgukbJqgYR0G530tLaha26RKlry1NV4wNa1P7SteWBEQKzJyj/AMWX5bb2C5wccAB3xU4PKDHCKNz0pUkpqearqf3jufe03diq5l1D79jAUNrprJJ0AA67f8WsGLg1J184odmy3cTIMs0gNodFG/uYHSbWuSuuqC53a81ayqxFNG8zFV1AUSQpJMEgHlzsWzUbz/NkOwr0aV94ajtOleL0GUOlOhTMfCVBMczm1jTWCT06a7i2k7ufx0C0wA1ucDqe+Sj4jxE0brlBGVNBp8RYaN+ccgNzGqFqriS8d7kCtW8t7l31WZnECiqAT1Y9TyHoPxJPMWzQ8gQFnXoEIxc62ZZYzY7VcKG7pVvFRkpLOQFidtFEn6C002PrEhunzkuAc8wEw8B0v+4BMSEfb902PZWkF07vcJixj/aJ2j3XfFV4DVSBy/K3pKAIp4rXrOBchXDtzp/pQdhJWWQdWUEgehI/LnYD6DJc8Z+wOBISdwAl4zTAad3p63p2NV/MVBAyzyaQde3L1kBE2dpJJI9fjEYe/uNlnYRL3RKb8SwZqF0fLEkgueUbx/fa2cKgu3Rs/tBMNpwiGEeSkhWkYCFjrBJPIA+nM6Ta7mj9t7YEyxrW0s0AxnDEvJBYsMpkRpuROnUxE2WLoJhZxOKprgFFQ4BaXDLmB1AM6KY0MGJ+dqyVEo5gCUqNNqKAJJzLJ0mNtdtBY9JxdG72Tdkqw6Cl4Xyq9aowU5lYjUcgdAe9t7w6baYBOa1jIOCtXemLwUWuoeusZSdJncHvvB57dIVq0mtF4DAdO9iXqUGubf1GffvzV7i28jwUZjlGYj0/sQJsg9kNI4Je2U7uCTaAcVmqUo8pAGmhI1I05Cy8YJBO/Dl2Eiprl3M/ePMxJ0mbBedEMp8oVAV7HawrpCuxpGKXeL7yKdEswMKRqATqdAIEknYabkizVNsgph7ZZKx3iKhXHmcRTJzQAPLJ0DxuR7gHmTBtYBBCkwZKbLmJE67cotdWUj4xUokOD8J013/vSbc19wyoBumQiOKY0tWjQWmQpYmpUReUnT+Ig6dC56WZqHxRA1jjGzvRMVahrQD3/aVsVxFqtUgmQNB0nmT16D3tnVzeddbkEpWcXOhDsbwh6Ipiowh1zgTtPbloB9LWq2U0okqrqV3NR3BfuidbSyneN1qkNnAJ6uV3/Q7pXJAFVk83bP8ACnqVzMekLzBtqtpCjSnZJ4kDPgDAHruT/g+FQvHM9z3vQL/D29Re1k/EGGvcG2dYjL3Dd8hK2R0VQT3iueKL9lqmOYB39bbVe0GkYCcrVSHFUOHcYP6XRJBEOsRrsw+llqVsdVfcIzBHRAZaHOfdjNG8cuIFd81STmOramxatNrjemJAwTFVoLyZW9Xi7Hw3DDl+FvPFwJEJOo4OEBLWBYrlFVK4gSchmdDOkcv62OTeA2hc2pIAKo+KCdLUdmgFTXC7irUykxpaWxBJV2NBOKDcSUmpnJBideQI7az+UWsDcMhcRdKZMOuilUqQBnUAzvI0BPsLNurE4evNatKsSwDYrFHApeRAnnPy5Wq61w2Crm1NaJjFV+Jriip4dUT4h5Asc3IgAa/32tNnd4sxkPbvvNDZFoaQNO+/7SDeMIq0KgV2UIwJ7DKOoB8s6de2hsN9MwXNxHeaz6lNzUduDVaQUQrEkAkO2g/gM7dBYLG33AIbW3jCaqd9dngUzpI+IZZHM849AbHNMNbMrUNO4xWqK+JRL1NXKyFHwpmGyzueRY6nXYGLAMhwa3L372JR4OizTE64aVbYHexAIQAle8lKeoQEsdBpy6244LkQ4Z4aqXwOxHlDT68zpuEHbfaxabWDGpl7o9KmCZdl7ovxCt3uNAp4YNd1JzsTmXNz0IExEDULoPNBNi1Kob5hkdBr65/e4I1dwpYNOfXbvjT6Sbw/h7Xh8qAAbsx2UDmT/f1sCzUr5vEYA9gJOjSNR0NCn/xFg3oKNkpooB3ACjfvabZi4A7zzcVNobD7uxSYNcxd6QvVQSxnwUOsn9YjoPqewNtCx2cMbednruGzieg3kJmhSutvu73d6L3iG+MLpTVvjrMajbzAlVmec5z7i0/qVSG3eA+T8D0U2yqS0NPfeCH8GUiLx4p+GkrMT6AwPdoHuLZtgok1SfTn+JPokqDCXyheJ3s+KQRIEbz0mxbRaD4hwwlWq1TfK9wjEFW80WYQi1FJjpIm1KdoHijTTngqsq+cJh45uJd0q02zJUzENBJnyyDGxH5g87OWizPrEXcxn8HgftNWmkXkFq/RVPEUDFS6+ki2GaDyAQEJ1neWggHkgeO4KrS9IgNzXkf5fh6WhriM0ti0wUpGoVMEQQdQeVikSphXri0VUcGDPz9Ra1PEwrUv3AKTjHDw7rWOw0ieh6c7WwuAd4o1YRCsXKtFFAe5Hcf3NmmMPQJ6yM8kopcb8TttYdSiArVKIiUYpKKqyR5gN7JOJpnDJIuJpOwyQy8YHlZm+IHXKwBA9AbNMtV4AJltqbUAa4IBiVxV2+JqbAgggeWRy6x13sywDB0T7/SubKD5m9/CvZCJ1hmBMzzI3B7NPytWZHBHkuZCNCjKAKMogAe39LJzDsUiCGmClLG+HqepAytqSPut89ie9nGnxc+f3tV3UL4vNWaNcilQvWQg7JTJj+I/dXqeesWp4d049/hKhl0+bv8ACbeGL+aNyrOD5nYDMfLmgHRByQfWDZyjRFZ7Jxz+AtGzMDyHnGO8vZLvE14u15cVKz1EYABgqhgQogEeYQYG315WZr2FgAvkQN5GeOOB5/2h2qlTc68D31VrAcRpEilRUpRWWqGZJCySWbmYBgDQT1M2LTbTFIlmmWgx7xJxRbNUZTaXM0GfwhGHXUXy91bxVMUg2Zvc6Kvc8ugk7C2fRpeLVLxiBg301O4a8tUlZ6JrVZ0Ru/YebzVTksgAAQANAo30A/nbYltNknTHiVs1LOJB/i3vmlDiy/LWvDZD9mkInooAHvAt5611C+pB0z45nqvPV333kqQMaWHsRvVqQfRADHuXB/0izjGmnZS4Zx/2MewPNFAu0SR3P9IDUoFm9hr7WTNEvdCXLC5ykp3D7UAnqdIIkdwYieYsN1nu1AAo8KHgIj/1y83UBaVRlDbiAdvXbexatR7AGlEquc2At+xsxUmnST1gfyt1mxZD3Fadna4sEuXdMiooVg1NuTqZj23j0sOoyJjEbEOvQvCQZXGIYUaiwcpqAeVxoG7N0/vbayl2MRks40nDJAcOoMawBVgFPmnTLH8rMUmOHmPpvV6NN14GFZx2/KaaBiBLH6f82JWp3Wn0TNuZcICmxnKaFMnaB8NmLLN8wmLPizku8IqArvOvvbq4goxyTXhRIGotlV4OSzLSA44K3fHESYsKmDOCBSaZwSZiKsWhT722aRaBit2n+1Db2Cpk1YPIbkegswyD/FWOKvU8YaimarMAE76wNzHQbRrJjuQB1nFR0Mz777AKtSmMhmlHEP8AEaneHK1aRFKdGXcRtmU6MOcSNesRa9CkykfK7HfkfkdVSk5tM4ddu7Z1VjFbtQqotWrLoQIqJuQRpnB3EA66HykHrZnwg83IGGh6wR+RjITNWjSqAPGHeOXXjIQnG79SSgip+sTBOseUDYZVG8ATpFmKZ8B152WAGzWfhUJbSGBmY+fwgj+G2g1JH9687NOqNqG6FQkOMBQYsy3WmbrSM1qn+af1R+p6zqehAHI2ya9VoAo0tcvXX4G6TqEpWc1v+qn33ojV1u3hCldgNhmqd3aCR/pEL6huptpWem2nSkenD8mTwjYnrPTuNDRr7d4o2akJWKbrTMAbknyyPQMT7WBVwAnb7Y/CdtT4omN32slVJb1NvOgEuxXlwMU1Xq65rjQiPjqT6/Zj30i3oqVPxKNzc3/5fK02071Hl8oJQoEMR2sFlEteQhNZBRHh64GpVMRMGJ9R+Fqspy4uKmmyXSp+I7iPECyAVEGefOfra1aiHwVarTxX6ArYePK0zp7WwWVziEOjaDduqG9OqwRFiMDijUw52BVaredJE62IGYwUZtPGClTijGnRPMxJO2XpyJ7/ANLaNmosBkBX8tP9oQLF0zXW71IZinmYDcZiSs+osO3U3OvBu3D0EHklbe1zoI7wxRbAaj3ikaRLqVMqTtHMemnOwbO+4284bvpVsVWAWuThhmCogBGp59DYFa1OcYRKleCQBCMJe1Bg72U8JxEhLGi4iQqd8rl4Gp13samwMxTFJgp4qW63KAZFqvqzkqVK8kQqT8PoWLmJNii2OAuhE/y9gQ/Hbgms5V+xIzEbA5hr7nazFmrO/wDcPhFpVSRJOv0sqq8I1MhK5KkbeGc2h2kDUH1FnHU2kwDE7cPwfRVLB3gmXAZ/RXoZgzU1dagH3ZBdVB5wysCfUCdyVwAe1x3RvjA8MCMP6RKTpaRw+isxvV8zNlM6aa/lZB9eX3Ss11STCO8G0ftWqAeWkpOvM7KO4zlfabOWYAtJGuA9z0n1RqUBpd6D1/CYq+B0xfLuhUFgpqVidWY6sQT0gAesnnal4F99o2x7A88eQ0VWMDqobtQzE7/lZmJkk6k7zz+tti81jAtCrUAJIVvh1ncPUmVXysnNlYNmy9wgY9onlYNV4IAOuR0ERE8TC6mb4uuOeA9PzCU8Tws0KzKTImVbkQdQR2IIPvbz9alcqGMu8PTJY7mXXkI/wy/jUKtA6sn2ie0hgPbX/RbTsNeI3YHgcuuHqtCxPvSzb2Pr1Qy9gLU01Gk8rabwAZCl+DsF3hWJeA+aJnTtykDuN49OtkXVGNlhzQ21QwwrJomoS9TVm37Wap0xGKMBOJWqYXjzENTY6/d79hbylnYHDh7fhZ9jguhyo0scFR4cxB0/rbXNlLG+Va4hpLck43GitSlyEWx6rnMqJCs91Oql3iDhwVP3uVn7Na7uaZZUa/NBhh9Va6OIyZArf6QFII25bWcNVhplusnqZTT8TtGz1lWcQxlaZHJdiIA19B+NhsoSJOaELjNEfu+IxSJU6xI97JPozUgobqIdUBOSqjEFz5SfMQD8wD+dieCbsjJF8OBHHoUSulEmYPcWXqOGqXqvAiURp3gxrZYsE4JR1Ns4IfesRKSx06WYZQDsAmW0WkJVxDEKd7WqtUsKa+UsrEHXpy5bkGIMb66DKBpAXcSdOHXXRFaxl0gdx3ohPC3BgpVkq3eqK1InUHQqJ6be8jnparqrKbHAyMMpkHvsoLWtpgmcI4gpvu3C9O7oyIAC0lm6tBAH7on8etlzbnVXXjy+eOCllcOJMZ+yyniDhN0qbaSdtd/QyT2sxUpiob7UGrSgymnA8ASnd0RtM753YTGVBvrrGp+VjXruDdB1P9BEeyA1o481NeL2oqVb1Ag0VgzzzKpHzDC1hSuw06HpifkK7brKxI07CznE8Qz1CWHlNim0A4OyQn1bx8yPU70adyNSmYbxkIiOWeNvW02ysGAO0j5Eq9ofdpNjf8Ljj8rlu9QAANT+XMAdhIUels61kRO89+ufqlbS+8Q7b3+Vc4duX6NdP0pdXqELOvlghj21hfXzDlZyyUWFwpHUSd8iByx6FO2KmGy6Jge+H30Va+XVbx9rRA8Q6tRnfqaeskfs7juNbaIJYIdlo74OzjkeKPUAeL4Pe/7yO4pMrofGUxBBEj++1siu13+QDrKyntPiArW+DcFW8I+YDy5fmc0/gPmLMW21OoXY1n4TjnloEJQxO+PmBUkHfS2HSJYbzVlswxCJ3K+LeTvkvA5fdqHqOjdufLXQ7VmtTXCDl7fY9uGI1KFdtSGvwO37++af+HcaC08lY5XGkfnZK12Uufep4hFr2dziCM0UannaQfLvNlgbgxzVA643EYqje6KLoW59etjsc52MI7HucJhBcbwA1KgK6Sv1s1QtIazFVIvYqXEcPaldCtQkba89AY/K1aVZtSvLd6sx7Tg05A+4QDEqFTPRfkyATPNfLB9Y3s4x7QHN3nriprOIPeuPym3CL+QgXWeYtnV6QLpVCwPxKOU2YgTz6WRIaDglXBgJhYnh/Fl/vGIiheFlDUyvSKAeGoPmIYQwyiTM8tZsxTc9lQhrYEYHbs3GUpRrVfEga6ItSwerQepUpOVRtGFaACJ1h2AR+omD2521RdnDM7JOPAeYdRvT5pljiAe/cd4px4KujXcS1RSp6EH8CRbPtfmF0Azwhc+kbkZpjvtZmKBE8QM0NLhci8zBEse3rr1RYLszh6JfzU9FQxfhgOQxJOkRMa6a9DtzsehbbuEK7a7HmHIJxNdD4QSlsVykyZgE/LXX/gQ3QdeJLjj9hHc0mTqeghD8SwV0uZXf7JdCf26h/MWM2s1zyBvH/tAVC3zuA0H0sYxakVOhmT12tl2kEHBZlYQUy8L0RXudajUqFPtE1ILQSHGoGoExsDrGlnqDDXs4Yd+vA6+uoRWeenB3pqxDhpGu9A1qmZLuuWFlSxLM3/kVSNCNlOx0sQMp1H3CMsccsGgY3Sdm0IrKTXmDp33iiOE3kVrvUXKFRiERRssLUKgTzJUSecmzDoa9r26STzA9uS1aBaWAjSfgHoZWWN4r3jLSYrG7TooGpYwNtJspXfW/yCKZgDPvesWq54qQ05IxfnW8hGDE1VLSSILoCMrNG76sDqT5Rqd7PGiKmW4j5HDZxKYa3xNccx8plwXFDRpgCu6EmSFI/ME2JUpNefOAY2poXYxQXE7wGYkW884hxJCyc1QrPAkb9bVY4tdIXCQZCYcHxb9IQ59atITP66DeerLvPSZ2FtuyVr4jnx0PA5cY2la1krXxcd6d7/finqhjwNBHU6SQfUa/nZZ1kIqlpTBpAku4fXwl298Qh6opzI3kWcZZw0b1UvE3QnO634BFdjDET6dPci2W+kS4tGSrUpyY0XGL3lalAGoYk8xPS00GFlUhqoxga4jSAqF/H/b/AHZQzDHSNCNfmbGYf9vFXqDDvTsINw5jH2oDAux0EKQB/Of5ex61MOZgVSm4OF1aDRrGPMQJ0FsZzRoEu5g/iJhV7/dROYRJHmaBmj16WvScNQrUC2ZIxWfcWYX4pziozn9XfnFtNocWQMFas0nVBcCvtdKopucoJyqupmOv96WqwumHoLC4GCtUwu+ppl+LbU/0slXpP1yRqjS4YZKLGcWygw2o3Hb+fT+lpo0J0UBgaELGNaIreYkcxIH+rt62a/x8SRgihzRj7dwrNWot4WoEY5mQLDHTlseum2nvagBolt4YToqNbDpBwx67ljnEuCNTLSCAJ3For0wQk6tPBRcEVStWrTGbzUmPkYqTk+0iRrDZMpjWDy3t1iaHXqZ2g/HyhUW3pZwRdr4HC+ISirMU1EKOZHz177nU20fI0Y4bvtOSAIOG5OGCVk8K7lRCvW09ssf7mtSoL14jRvvP0E9TeLkD/ies/QSRj9wNOlUFIbkGqw5T8K/PX1A/Vse0tmmS3Ceu09/KVtlG6TdSzUrNRNB5Og5aaSfytm1aps5ouOUY8ys17nUixw7xT7cWSqoqUw5VudNWYacmCyVYcwfYka21G1GuF6RjvA94n09YOC0mV6VQXjh7eiA1UVAXqTkzBZH7R3+WsdjbzoNNol6zJAGK7/6RVd6lMCCgLGdNBrYtOgXEjZ85K7WSquEXo0qquv3Tr0I5g9jrp62ilV8N+OWq5j7rpWhYM9OmCQZoVj5SdkbkG6RME8wZtsVCawBH7h1G7vPBb9FwqNlueo9+em/BDaWGA3pZTKA8MOgmDHt+FjOd/rvg4xghXbtS9sxHwpn43Rc6lQzZjr07WSfTYHQCcMEOpaBMDRE71emrXSnUPk8xgNpppET6G00wGVCNw9OKgu8knPD5V0XcNQOUgqYk/QzPIAk+1hOfFQEq95paO8/zCk4cuS3aZ1M7m1K/nbdbkhhkNLUxNd/GKsCYBneyYf4QIKpfFIQVfv6ymUantZekYdJS9Ew+Tklu/rTpxIg+3vbSpF75gpwuEJXvtxNWoCqyTrIMFI52aIAEuQSwnFfVeJLnc/8AMvIqOBGWkM5+YOUH1NlK1obEHDj3KG600qeEyUExf/Fei0rTujMOruASe4CnX3sm21tacCSeHfslv84jIc0RwHiSuyeK90o0aRHxVGeWB18o1JmDBIgxvZ5l+qMSQfTDjs99yNTr1amgCY8PxGlXA8OQhzBnBUAFQCAF3M9jpGsC0vZUZnjlGe2M0aThgDwkKhxbVu9a7uBVRqijSdGYbQeUj129LcxjsQRhj6HvdmodkR336LLOHGaneqdT9VwSNpE6j8rDsgPiQdZHNK0QQ9HccusXlqIBnNoeoOgPvZ9wFVwG2D98kzUbefG1ON1pCnVp0gygUKZJJ5MPx+0aNNTAtYmaZIH7iOX/ANQmWZ3R3P4SvxteBSorQpzmZ87kxmOhCz00JOXWMw5zateo8tvDM4Dhr1AE6xshBtb3CROfZ6+2yEkcROJppzVRPqdfztn/AKs8Xm09gCzrYfMG7AqdGs4HlZlHRSR+Fl6bqgEMJhLtnRM94uVW9NTps5Wig2kTmJ5DrHM7a2H4BqkSfKi3Lx3LV1wlKVOoSVDNTJqPGpkQAOgEgm2iKgLsBr7arVbTa2kTGKzO63BWkqxYTpy/K2c5ZZVy6Xmrd2hYem3xUz003GmoOxGtmLPaSzA/kcPrIo1C0OpOlpTJf7+Gp061IMSpyukSwBHl235idNh6nWs7g4OByOI46/BjitT/ACPGBIGPc9ceaqcI8LEK1Womeq0lFIkAdWHPXYevIaic8U3HHM4n4HyeW6KVG4C53e777hiuuEVmpVBXhmLgxIJ2bvpyFqPrU7wu5QeGYUkAtg7/AIVy50lpUyrDyMCpB5g6R8jYb5eRdzCq1sCJQLD8SdqhpPJdG8N2mJH3XHZhrPc2Zc1t283LP8emSq11444RnuhH8U4mpXNqVMmXquERZiZYKWPRR9Tp1IzHND8SY7mOPfEVoqNaBOZVqlizGqABINius7bmKM5om6k7/EHjmhdqpp00FauN5+CmehjVj2ER1mRZc2nwWR/f4SdW1in5WjHasrxniu9XnSrUOT/018qe6rE+p172RqWyo7LDvakKlZ9Qy4oPTpliAoJYmABqTO0WXa1z3QM0JaRwnw4lJgtSHr5WZhutEBSRH3WbNlEmQDEaibegs1hbTZednh1PTCcM4z2LSs9kGBfns+/ROahnDF1UyqnIw+JpdiBznwyDOh09rNeVtTyndI0GHzhsT5/feOuHIT74KajSp1a1IrKFR8H3IO4UfdPY79Z0POc5lN0479fXb8cF3lOXfHb3gs8xm6xVbcTM8tdR/KwazBfJCSqCHFLtW95XIGwskatx+CXL4ctEo4hSagl+j7SmuSOjAeVj2Cj3K9zbXa8OB2ET6ajn0K1L7Sy/u/sc+hSxccYzXhHqagMJHUTraKFa/UImJw+kvSqzUmcVLxQhp1qtWqZIbyz99jJn05+462JVcym0VjsEDZh8e6m0f6/9jt0d7kiVqhdix1JM28u8uqPLjmVjOcSZK1/gPBVu92D1FBat5vOuwEgAA+5nmCLazh4QDPbfH9cQU9SpQ3FBcFurteaa7Sw6WSsjx4gJ0QaTpcE94gzvUq0qnlp1FIVuQO4k+o/G2s1jfDBbmM+ULcqgllweiS3oVLuTTqU28uoI2Ydjz9bZRs9UZCRtCxCx7TBC9u90rXh1FNHgE7T8/lbm0HnEiN5wUtpuOSe8HwmndqRLMhc7kkmBMwSszrHOzTA4Qxsx8+q1LNSfTzkd716cWU7XhN4CwQNNtIizAox/HqPtHJZp8HrMonht93mCYPOQY1P4GwK1LYodTLh3rgq+NUPHXMmwHLra1B3hG65CLcIlKGJU3pqb7GVkUU6i/rAuignr5Sw/g72YqEEXNDj0M+wPNL1w6L41wKN3v/D9cQJvIfzGDTkkEJHkPYmPnNvMWy01mWkRHl027euHokKry594qbGcQN1u14rRFakhzL+q5IVTH6pYgjluOVtWnaW16YIyHPDMd8dU9/kB1En+XeK/PDFqjkmWZjJJ1JJ/O2RUeXOLislW1wesaiUvDOeoQqDQSWMAa9yNSbdSb4hhqmCmvhDh6qoWqqTWqErT/wDlqsB3PQ65QeXmO+U237BZG0pfUIwjrlx28tJTtkoEuvHRbFg+BU7unhiDUPxN23j0G/taKloc83hl87eK0WkjzDJBOKLyM9ALpN5QiDyQMTHpIs5ZWwHT/wAT1I/Ku84sadZn5+Vap3xP0hGWArIzg/ugz9VNqmm7wi05zHt9qf5JLxyqtdnC/FPl/A89rWeA4XBmk6hvkpGvdyZamUgg+lsx9JwfCTcw3lewzF2uxKVFzUn8rodJB6HkREg8iB0sxRtBom6/L2/GhGoRWVTTwdkqmPXI0XDqc1KprTccx0PRhsR17QbUtTTSffbkeneh14yhVZa6RknLDbkt8p0ry4zmkjg0zszpAohhzkkLHMIBztpGoyqwE6meH/PlEjZelNVW+OA/ccOGf3zSVg9BVzXqqoKo0IkaVKh1AjbKu5H7o+9IyKTIqGo8QJ+ffZz0WbTbjJWu4vemVaCsTmFGmWPVioLfUmzDwCSRtPutZjMPUrPmvVREeoGKsikhgdtIEaTOaNZtl0iWhzm6BZLTGIRvDuIat4uniMGYyVYjbONdANpBBjubbtiqitRBb+4YEfK12VjWp3tRn9q5gNeuzCKrou7Azr6DrY+eLxPpir0yS7zdVNi/EjyQgCpzC6a9TA1POwwGs37/AKUuqhp8gj3/AAp7piIqUoZlBmdd/exAcbwXeISEtcT4YaQ8Sk0g7/zsvaG4Xmpeq2BIXXCONtTqKCSRmGYE72rReaguH+lahUIMLTsDhGdCSROh6g7H0I1tW0y5ocEyQdERv1OmyMuUFWBDAzqDoZ9rKsvSJVQ0uEPSVxJe6t3oILnVJqUKYiDDNTUAMDH3hAbTT4z0tW2WHx6d8jzSep9j7wlLTQimCMxnzwKyHH+I697cvWckxBknblPX+lsWmDSBaDxWZKqYPfBRrJUK5gpmDztDhIhcFseB4uuI10riitNKACLlXKCxmDqTJAJYmdCF620v02zeHTc46+w+z8p+x0r5J0Ct8KXoeZwpCMcyE7aMyKvc5aaT21tt2iiWwzUYHkCTzJhOWQZt2x39I3eMVWnVZfvbEn8B30sFtG8wbNEdzmgBqA8T3TxDmMjw0bJG+apBJ9AgX3btZii6GmM/oQOpPIIdVoJLtmA+fpCLnWREp+IX8SndqjbArDNUQS2b4pbp72NfI8katk8ACfZDD4N0jZ7T8JawMZquhOp2HrzsjRMvlLMzTBxJh4RadT7xPyiCPz+VmKkEor2xBSpxbSEKQNzI9wbJWxuAS1cYKlhmICmhpVxnotrk2KmNGQ/dPsQeY2iKNQMbdrHDhPY7Co2AIecEy4PiF0pUqlOleWQOBIqIZEEMCMpOoI39baVCtZmXQ2IE/wAtojUDkn6VaixsN9/wjWF+BUnM93qgnN99Jf8AWIYKmYaTlZC0CSbXfTb+6kCOTh0k9DGgRKdna432acCPk9DwTLVwd7yFY5WZQRKHyEFiVymTsPLBMjL0IJzXljDBkcc9Jn3nLHbIFHFrDBw45997Vm+Gv/1BaqUwBWakcyGNSI8wO0EwCTGp13ko0rlVrruBIy37lltHiExmUw8AcPV1u1OpSdUL5i4Jj4WIIcGNoiDtFr2YFlMQek4o1KjVDbzU23mlQGUOM1TYinoD+XyEfidJhqnLLf37ladMHKpn174lD7zcqQzKtA1ACc2SorEHqQFJ+YsZhMCXAcWx8hWIYMvaPlLNSjQd/sqzUXB1SqDHoCs/gLWLcY13fRjoSgENJww771VbiW71ygDL5I0ZTKt3BGn1sC0McRAx9/UZoVRjoQvCMMrgiVhdwbAo0qjc0NjXBa3cwDRR+agK3ttPtp7Wu8nxC3bj33qtEGR36/fqoMXxbLTGTUsY+dpp0fNihvfhghdPDyW8TMc6nly2In6GbMXmgwuNMtxSvjPBlG8szIDd6nOFmmxP7I1Q+kjoosnaLAypiM+v57xSdSyNeZbh7KphX+FrFg1a8U/DG4pZix7eZQB6mY6GybLC1jsZPHL372obLA6fMcEdvHGd0uz+FRogU11hZgyKZnTXUMwncGmBYn+SGktPPl+eSL/l0qQNNuX3Hx7Ilg98S81KfhaUqWaET4YUnYD9bcdcwPOz4qNdTLwZnCTty73JmjUa/FuQ98vzwX2I3pXrSSPJ5ng/QHrNj02Q3DTL8oj7t/DRDUxtrw9TxPKigliBoomIUcyZAA5kgWpSgA3RgOp7xOwIHiTJOQ75lDMap1VpMQmWpXyjJv4dJB5V9SYJ7ifvW6oXeGbuJOu858hh6xoqPa5rcczn3uy5qLhu4ZWBfew6FO7mqsbCP8SsBd2B3WGHsY/AmxKmUolT9qQL1fHejsImPlMflZN1VxYlS4lqA3qmZ6zbPqtMpV4MohdsKdyQFMwY07Wcp2So7IJmnZ3vMAIrc7heVUBKRI/dPz0tpspupi6tCm20UW3QBHe9NHCNGsgqCorDUETPefwFufe1R6Yqx5/dZjhN/a71kqruhn1GxHuJFvLUqhpPDti89TeWODgtqwbG1etSRACjeckbHMZJ7k6k95t6MsbcJZqJBW2yqZw2HLejdyenV8+QZk80g6SNpBnnG0WpUD6flnA4faNIdPLvLTbKy3H7tV8YFCw824NiO8U1hdMAlIOvl8g6rni3Ca7V6lQKxTMEz91ABBPXT8bBtFB7yC3YD2EOpScSivDF7agctQ5qbbqdvXse9iUy6LrjwOz8bkak8twKbsUanSpCqNUOx/I9xazXmTe0zR6gAF4KHhLFPHLq0BGBAjkdxHU6R7m1KhvNvjMFRRfIjvYensgt+Z6V4yt90gg8iDtB6WJekgjJCeC1yZ2rx9rSGZlEOo/8icwP2lOq+452rcnyuwByOw7eG3noEyHXhhmF418QqHQg0mEhh9Z6EcxawY4GHZjNUJBEjL2QPHMbFKlUFMnMwhSpiC2gPaCZ/ubBtb7tIuS9WpcYSFlFR5JJ3Jk+9sIlYqbeBrzU8G80qc5jlPtqCPoPWB0to/p5/cNRl98VoWJ5DXNCHLhtQVQpYiTBk6fOx6dF5qQTnmiBhvZrRsNw2lRo5yJRDOv/AJH6mPuqDpz15FtG3YOuD+h9nvLHRa1rBPY38T3ljFRvS1apNQAzrO0fytbSG6IF4E4oBecRXxmROp39bDNQXrqFeEqtj1dvCfUmVI+lqVybhVapN0qrwthTV7tVGihTOdtFExEn2tFnpzSAfrltPBRRplzMVBWr3S7uoym8VJiTK0xtsBDN6kr6Wu6pQokCMfQnn+0egPFQ51Njhr3yTPd8fqBCyxSzckAUgcpKgEk955d7HgPEuHPH3WnRZebeeOePulA8VXpj/n1P4m/nYLarScAI4BZotbzlHII7hmPXrKft6h/1nv3sc02nQcgnqcvbMDkFmrC3lHCV59GuGeJKl0cEeZNfLO0giQeW82astudSbcOLfymKFpdSwzC0S58WeFTWouRrrWORmVSr0W3AfzEETz0jvpL764c5tVxlp6HetF1eAHt/aeYO9ECweqihQZOn87aUxiVan+8LrGcRKXpoQFZKlORBadfeT6mRYdMeRrTux1n+sOCkvLSB338IZivDZqVglN8ilPE833ecGBr19xtsIewPbeO2MNTu75qH0JOCmp0ayI92rDR18vMSNQQec7ehsRjQ7GZ37tQff0UgOAulJN2xKrcq6n0I6etkHXrPUuvyKTDzSfitRr3qlVVA8AOoak/IT91uwMj2NmwxzcW47Rt3jiMVpOIcBPffVUK/i0NxHQ9uWuxsSQ4YYoBDmYoPfsSWi/iIQoc/aU2BNNz101Vu4/MzD3tgBxiMj8cOKo5wm8DB12FVqt4SqlQUCgcgxTqKHBPQOAQVO3mCdLUtDpszwBocQcPUTI6qtR3+t2HJWeCOD0vVxp1WRTq5JO7BTUAB1n4m3/YFvJVHuBkJKg2m5sOGPvn8qfAcLFyv17ojYU6QncTlBYTtMmSOU21P0w3nGc0azXW1HBu5GK9zV3QeGpdick8gNS7R91Rr3MDnbcwALtnYA3npmn2tAxI4BD+KLywELORNADz7mNJJ1sIgtbOpzQ6rjl2T30SxcKlRQZJ62FTLgEBshLeJXlhVLbEmyNV7g+Us9xDk78I3fxkNW8QKSnbmx3hZ+vTTeQDo0rxYCRicvs/G1PUG3hed331Qq/4yzNVpABKSIwRF2AUxp3MySdTzm3VK7iXNGzPU96AYBCfUMkaJYpqAVd/hDCB+trrHYf0sg0Nm+/KcN/4/pLNABD3ZTz/H9KetirHVhE7en8z/ACsw20keZwzy4fn6RnWpxxOvt38KldkYuYBIk8j1tWg1/iHAwlqbXFxgSmW7IwUZUPv1+ltcMdsW3Sp1Q3BqS7eQXnV9H9/2LUcNVynu9+ZadSmD5KkSOUqwIPrpHvazahDCzQ/BzVg8hpboUxcGcXvdq1MVDmoyB5t0HVTvA6HlZqhbXNFxx8vsmbPaTTdDsQny+P4l/CTH2kR723WmBwbPRaBP+1NNB1ZKtT9efYAgadPj+lguBa9rNkd9E0Rlu+j9dUOut7WpkpCCCYU81MjUdp3HP5EGcIl49d/eiCypOCRrzclrNWox5g00ieRb7p7MYA/ajaTa9W7UDmv012Tr6HPdwCBUaCXA6Fd8J3wVlNyqmHBmkSY1/V9DHzA6mwKT4lj8258Br6e3BVpOmabsx30ThccRyqaNZcyrprv7dP70sR9OTeaYO3amA+PK7v7996D8R4AtRGqUmBpgElToUA1JI6DqJ9rCqAEefD2Pqh1aQIvDLvv7Sjg9Ff0ihU1CF1DHsxysfYEn2tjVXXh5VmVHXsQtM4WvNS7UVpNSMqXU+GkoHViGJG4GcTOoIg2zSMSitHkaQOXUFAOJL3fKKi8LSC0mdnZjlZXFQUspcAhpzZgTpJPcS3Zq7qWDSqeI9ri5uR5Kbh/H/EStWfSszZI+6iAAgL0BP+0d7b1GuK9NoiA3PedvL5GxaFK0+IydR3P16rl6viKc9mJkLolcm6rlOmptMBddS1TwDxqxDEQJLMZhVGpb2HLnZYWYPdLsh12D1QvBDjJUWIcRDxAigrRpjLTXt1budST17bRVtYa+72fwMhu3qH1wDCH3q9gVHIEhx/uAP42E6oLx3oTniVUoXB7xUVEBYmBoPYAAflYbaJrvjQZnQD4UMourujZmdAE4V8Ju1AZq48WrH+XTPlU6aM+s+i/xA6W1boOMepHsNOJ5LWdSZF4t5/A++SDXrjGpTYrSo0aYG0IpP8TAvPvZStagxxaQTxPwIHRIVbaWktA5k+wgdF7R4wvrDSu4/wBTfztem8VBN0clDbS5w/a3kkubeamCsxdWIuXBFhObC5fdZBn8PURaq5M+FcaVUvCVq4FWGljCq286ECN+3bTe2lS/UqoFx+IyyxjdEJtlreD5sfRabieMolEp5VDUlyxqYaHEk9RJ0gSbbMNBvk6n5GA+1qVagAzz/rJKOG4wRXpKkwGBm1KdS8+5oZ9krTd5wFY4hy0r1VXMV8Quix15d99j1FitcwOaHHF49Jge6uS2/B/ku8ewQC9fpCSAXYH9l1OvsdG/1RysPwsW1NQByjA/B4b1U0iCH64JhvVXxhTJOWpIEnZjyDHkx5E7nTeMxA27w9vx7cMmHEOAJ/r8e3CIo8VXd0u78pAWPUifpNl7VU/0ug5pa0Xm0yNqVsKo5qJB5Ej5Eg/hbJYPKkmDyrUf8NMSF6/SFrhTUDI4MRIKBDz605PKX5TFk67AIhWpuc0QFF/8SXe+rebhXiklR2WlUWMpAaUnkCCARyNoNMshwXfuwSVxNwdXw4LUNSnVpswQMJUkkEwy6xIUkEE7cubNmtF10hVbNMyorpe1MeYDT2tusqB2RTzXgqC/YstMEghm6WrUrBoVXVIXd+vJpXIb+LX1JjUIDoPcgn/Sti1HGnT3/JGPIGPUq73Xae/vvmkS8HM3Mi2I/wAzlnOxKvJQLsqoCzNAAGp6bdbNMpl5AaiROSdEi5UvApn7dh9rUHyKIf1RqpI3M/d+LVpUw1o2afZ37BoN+WxQpikwDXP8n42cchOH1CxdOmv8X9Z+YtYHzEFTZ3lznNPHn+ZQ7FsId3UU1ZiRpAnmbLWmy+J5hzSdssji6WhWLpwhewPNQf3lfxGtgspXGxfHpil22Z4GY5yk6beeSC+BtLXQuXZFiESuXBsIrkW4bwj9IqeaRSpjPUYclHIdWJ0A79JNnbFZ/FfJyHfLaiUqZe6E23Ov4zM5ogooC01dmMKgyxowJ0jUm25RqjZgMsp6g5rRY7cjOC4JSqsKlIeEyMpdJLCCd1nUdxJ9bWvU2+eNvOMjpwIjgisa39w0WcYjilW8XnO7Zm8Ty6QBLTAH/JtgvqPNcAmYIA5rKvuc8SdVrd9vSirWpv8A5bjPPQHXMP3QZPbNGsW9AAS1sZgc9COi2Z0Og/v79F5dLmKErVhlYRGhBB/pztAy8pVW/wCs7QeqEcS3xsqUg+elJK5pzrAjKTzUZtJ6drI29wIbAgnOMjvjQ7Uta3ggAKhhDQ+WIzZvrv8AjZFpxhLsOMK3dHqUKrGmYYqwPow/IwR3AtVzA7AqYIOCGXilANoKGQq+L4xfDSF1qNnpkh6WYHMJBACmdYzEagnvFqmzlj+PypcH/tP5Qi+UDTCqCTA37nf6zZstLAGhFLboAC4udyd69NQCSzACRvrpPLmOtr2emXVhey14DNVYwl4lFuKryxvDqPgTyL6KAoPyAszanuL4OzqcT1KLWJvQUu3gAHSyD4BSzs03cG3QUaVS+PEjyUuoY7uNd1UGO7KbaNkpQJOuPoNPU9AQtCx0B+92WfoPs+xVC83rzetny7UotWsL0lGsOuKU6f6TXkJqqqNGqHSQNNANJb2HOOOBwz6AfJOg9TvZAFMX9Y5A+52DnvoYrxZXgClFJP1UkAjTc/E3P4mNl65IEtEnacSPgegCRtNpcf2j1OJ+h6BLH6ZUO7t7WVFoqnMlJf5FY5uPNCLedSi+ty5eg2s10Ll6bWInFctl/wANuEVq4bnqSBUqsSBoSE8qg89Dn+dtWjU8FvhxjGPrj9LRsgaGkOGJTPhfDtGnIYDcwJ5WZfWIHkToYAlj/EfE6WH0vBof59dTJ/URtCfU6gdNT0svVtRDJPpx/CUtFe40sbqsaSoQQwJBBkEbg9R3tjhxBvDNZkwmXhziMrXT9IJqKSq5ifMuy79MvXpbRslvew3XmQdTpOabs9pLXC9iE10eJbmGN2eqWoj/AC6gDfZ/ssY8yA8xMd9ho1LdZyJBx1wMHeDt6Jk2ii3yg4eymxDB6pIZR4ihZGTzSDqGETmBBGomydsIF184HJDrMJhzcQqtK4OIcAhgYyspE7Gev0PtZaYAKDEYo/UuNRhMISRpBIPpBFiFwhGMRKoHhS+15KgIBrsIgdS0E+wsE1GzCXc4SibYMWRZMlREkdRrHrbZuiACtANgJZv2DqriQe/9LUFMSqlolGeG7nS8YVMpmmC0wYBAZgCdpOU/I2PAgxmcOZgotICe+HyheJ0KZVn8us6ak+s/372vUgySqPgyUiVLtmqHU5Qfn2Fsptn8WpGneCQ8O8/cm7iSp4d3u9BYEJnI7vqP/YKfytsOwBA4DgPzK1bU66y4Ow3D3lBcCuJvFenTB3YSTy7nsOdhUyCZOQxSdnaHvxyGJ9EU4mxAVKkIIpIMiL0AmJ7mST3JNmTIwOevHvAbgE3ann9vPjryyG4IB4qllVpyzBggH2JBA+RsrVqAkMBiVmucDDclNesOuqmDfJ/+nTdhPOc2T89rIWhtKRddHqPiUOq1jXQ13foh2L4JUoa/HTJ8tRR5T2P6rdj9bZtey1KJxxGhCirQdTx02oZZZBUt3u7OwRFLMxgACSSdgBYlOk6oYaFIBOS1Dhr/AAnMB75Uyz/4kgn/AFNsD2E2fpUWU8YvHfly16J2jZCcXcls2DYZSo3VKNEmEBjNBOpJ1gDryHSw61V7qxc4ZxllgIV3ucKsuGzLcEv4nfBRzvVEIgLH0HL1Ow7kWfaA5vlK0C8BhevzrxDi73q8VK77uZjoBooHYAAe1si0VL7sMhksB7y4yUPiwVVehbSAuUyCxWiFIWtf4LeI71LuzHJ4ZqUwYIU50BjmAc0kddbGtNK7ZwT/AMvg9+qcpk02yqfGWOirVptQqEhUkMhZSCxM66GYA262YeA0BuwcVaqQSEy4VeqjUx9rWJjc1ahP+60BrYyHJSAIyHJVsVViDNRyDyZ2I+RNoutGiqWNGQVm4YoMoDRtrbQYbzQU010gJX4kxw5iUEge39m0PqXRgqvfCF8O4w3h3pwYIp/i6A/RrGsr79MuO32a4+8KtKpLSe8ig2H3qpVfLmOXn0A6mylB76ro0QqAdVdA9dyL33DFVkywF5agk7TME/MxbVp02iAFpf47Q5oGi548onxk7UqQ/wDxpYFobeaHDa7/ALFL29skEf8Am/7FV+Bj9vUI3FGr/wDrew7LHm4t/wCwQ7BF93/p/wCwQo3rzEHqZsQWgBxB0QDVN4gqniFWfNzbbqB19z+Vsu1VgW3h/LLcNvE+0JeoREjXvqqC05tnspFyCtpw27MoCrTB0g6Ah+8e1vSFouwcltMkZIlfuAaN5oMi3elSqZfLUVQsMNRJUbHYiDpNsqtTobOSrWpUrpkAHcpuFuDqWHrIAes3xVDy01VOg5Tuew0sVgZEMEDr69wF1Cg1uKI/pwAYMWUnY/jFmfDxEJmZVm742tNJqMAswpnUnt+fKwalmLneXPXYqvpg4nvihXFXFl3NMU2Vak65mVSNOTAgjePlytajZjSdeJjd+UMMpsPmOGzTikx+HLg4SoyMPHJANNvKjbeQR3BgkjUxAsV9kpuJgDT1ns5KrrFRJzzy2Y5fKzzG8Ka7V3ovuhiRsRyI7Ea+9sWvR8N0DLRZNRhY66VRFghUUlI2uw4qzVsH+CGHuzXmsDGWl4Sn9pyG+mRf4ha1pf5WtKOTgAkvDbi7KAFmBuO8/wArNubGKJdhO2D38KArI405iNumtpaEVoU1/vBytFNivW3Fq5zUr3itlJIJ1HI2MwXArtbdEIJf72PmLc54hDeYUnC1LxKdemNM1N46DLlqa+1M2asYmjG89RdHUrqDb4gbeU4KHB7sfu/CNfU9T+VrWamGjDL33n4HqmLJSOmXvv8ApHab7a7RtHKzozWq0hd8d3bM1GoNnpgfw+T8En3sK5LS06E9cflI2umXDgT1x+UJ4a/7e8rmUhpIYEgAgR5YI0J8wOvMCBGtKNANJE/uGHHQ+yWslO7ULT/IYccwg/Fdy8G8MqksjQytyZTqCOxH1kcrZX6hIqSBgc+OoSNqjxSW5HshCGOY9NNT+f5RZIA1HSfXd3kB6JfMrhzO23K1Xm8cMtFBX6BpY+iiVokkA8wPlobbzqD3Zlb0lXxxWWKBlFNSCDJnU7HTodbCFhDQTMlTTot1z7wQzE8VqAyEB7hpHtpZllEAYJhzCBghLM1NRWvPm3yU/vNP4LI1PsOcXa0YgZ7dn2d3qd4w0txOft+d3Peo4vj9WqxLCANAo2XoAOQFl6lQjADvaUlVqEr7A8PeuTmYikmruZIAP4k8hzsWlTJALsdg2/jacgrUaRfnl799E73XItLx9Fu1JDlXTzxy6FmaNepA6CxKpu+X+R12fgDL+ynXFtNs997NepWU8S4n+lXh62XLm0CzIAUAAA9lA3thWhzajvLpt13+qwqz/EdeQnLZa7CDC9C62gNxxXQtM4bxhqNzrm7yrNDNTH3H+DOv7BBDR91lC7MLPCxh4a7pu+/ccCmmM8shVOFqurqei/SbWqYq4MpjqDRf3h+doCI3NHb3TGSANALVUFZXfLwSdrGJVyUHvSFj0A3PIWEWlx3bUu4FyZOC1UEE6Ug4zTu6tKMW/ZysdLatlbNEhg4bSRjPMLQstIvpm7kMtpOk7ty4xaiaNV0J1DEEHtobMkg4jI4o1Zwa6Qc8eaHPXtyWdVKa6A/SLnG7J516xorj2hD/ABm1nfuB24euY+RyWjIeA4/yHUZfPRJOK31ZyqdRu3P09ets21WqPIw8fpY1prNm6zn8IhdK9O8oKNWeqsPipk6kgHRkO5XkSWG5BYDqdqbv1HyN/wDR0IqIqiBy+VTvfC9WIu8V15+Hqx7lfjUbiGUfWyFaxOAhhw2HAz7HdBKA+jozLkVRHDN7O12qn0Rv5WUdY6ozjmPtC8JyZq2MskjI0jSDpbZfUczMLSNQt0XN0xCqzDyzJ01mPwtakXuOSLSdUc4ABaHh9J6dMGuVJA8qAanu87DnG57DeHEPMM9T9LUbMRzP1v35Decg98oCvULFiSecn27adLM3Q1sbFXwg/AIZ/wDB4BFSu5WnyXdn3PlHIHXU6b7nSwBTpuf5cT0HH69kt/hNLs59vU/Ax4ZojeruoQNUHh0E1WlOUQdM9ZtwD1+JtlGogzqzKQLieJ+ANTuyGZk5kq3KbZccB3AHxkNcc0firiZrx9mkiip00jNGgOX7oEmF5AnmSTiVrW6oCAIB5xv46/QCxK9pdVywHfVL3KLKEJZdUxazQrBT+BBte4JlSWo1htdqbiovxDrrMiCDyII0IOhmzDTdMlGbgZTNcRSYmrS8pbRqevlO8qea+uo213NqkHzDvvlwyR4BxCIXqpCehFhBcExLVDrodxaoUBIvFeElKhA011FnalO8A4I1VqBi5Er5vgB+Z/vn7WtRsxqfuyHVQ2kXNk5IjgDS5BEBhl/lbSpyBMQn7E4lxHeCucYXRpS87hhleOTrAee50f8A19rDwAI/4+xy5ZeiraqV0Xv+Pscvr0S9XyRoTI+KRsZ25zr79rc57Ll7RIktc2USw/FDSGRSC480HUaiGQ9cykg9rcyoHzTOftrzGaMaxbT8IZ+2vNAeJMMFNhUpSaNQZkJ37qf2lOh9J2Itk22hB8RuWu4/RzCy6zP5BBGqEbE/M/3Fs51Qt/aUAmMlaoYk40MN+9Zyh+pVm4HHiiNrOG9G7nfadUH9IqtTI+HJS8WZ3nNUXLGm0zJ2jVv/AD6keUBE8Q7AmpMTrIuS80VcxvUXUjrnGrDoZNqUrW8DHocOWXRMsr1GCCiOHY5QX/wik3/qIMxHs5PzBU97MitfzdhsOA5tjqCm6VsH8uWXtHUFSNil2GrXh2n9jzf74+psbxRkAB6/hMm20+z+FcwviG6r8CshB0eA5PoDAHrvYT2uqZukbMR9yo/yWvzy2YjqJJQ/FeJqKNNOmajzOaqZE9cvX1JtaSGw4+jcOv0AoqW2G3R0w6/QCWsZv732BVOzZoWANdydNz+tv3srWDXgNiI71WXXf4sTolS/5czFfhnSylQAYhLPAGS+NzdVV2U5X1Vt1I7EaSNiNwdDBtWnTc5t4BVaCuqKCdfprYtOm0nzHlj9K4CNXa4qRIZSe5IP1AFtAUGRgnGUg5syJ724Kx+i5RGnsQfwsq+ndVCy7giXDyedv3fzFhwpYEWvyypFuLUQhT4OjVWWjOWQQW5AAEk79Bbmi7jChrDKYMXwtWprUqMrMPK0N8UbMfz319bNUqkuLAMPbd9fhP0WCo664HDd0+t3BKuJOhQhQBrG2ntbSpggpx4BbAQllCarJZRn06CNfnt1JHratotApiM0vEE3cwJ9B96DVFLrfA6MtZWyOAHAAOQgHK411I1B2BBIGpBsF9UBt+MQMtoObe9YTBa+oMWydnuJ9M9DEayk4pdmoVSkeUaq24MiQwOx0II7EGyFd92pDcsxu/Iy3LAeC03m/t0Peon0VOkxUhuY11nWwWPNN14GIQheBkJhw+8KyEOuai+tRBEo369PkD22I0PIjWYBVbeb6j4O7YdPczRIvD1CBY7w+1L7RD4lFvhqLsex/VYc1OvtBOParCWy5mWzUfY35JarQjzNyQlFEHedPSNZ06zH19kmhAAXRrRpFieIBgpvQtDwu91Ka5ZzJOqMMy9zB2McxrYtPejseRmiApUKk6Gk3uy/I+YD+KzLQe+/pHF0offOHm3pgOvWmZ9yPiHuBa2HBcaexQ0LsRpqLO0wIRqY0XF5uRPw+8j+4sRzNVd9PUKAcPGpr5kIEZhzHQ9RZOpRa4zkUqaUmVXrcNBdWbOOgEfPW0izMP7jO5T4DYklFsFZqUrAKHdGAKnpKnQnvysdroEct3AotMgYFS3m53NmE0HQ8/Dfy/JlY/WxbomTB4tx6EeyIadM/wBfUK7QwG6FZWtVX1RW/B1tF6P4DmR8FXbSYOyPgq0nDdBtryxA2+yj8Xsu8A43I/8AV+FBpNOI9/wrdHAKdEF1rFjERlidR+0bBgTl1/CpdA/v8KP9HZyEQSzGAJAnQnc+lrPhrZKtgBKlwqgKNY+OXp1EIhRE6ifNvpBGnPWbQyXtlkEFWpFpxkdfhFcRvt2YFcppsQQrF2iSPKCMp3Omhtem2qwgkyNkD7TTK7mnF8jZHsdqzvE6leg+RhqdQNGWDsQdQ09iR3Nm31DEt112fncRggVK72/tMzlu/O7RT4c70xLkawTIB20bXeSpY6GJA6WFaGCm0PqHvDqmbJQON/PP0nHp3tq1r8TnnQKq51E7GS8EcwT/AO3vZFtpAc3xB5Th369EY37lQAwWNbPrJdHMcYjVTKECJSrDMipUcVNSUMgxpqRmBnnoY5hgvqFpc158pyO7ZO0QBOuR3TUsbWMYA2bjHFw2kRhxzj/+Yyylo4SaEF41ARGGobKJYgjTVs0+lh1aDgCcxPrjtHfVPfp7KVNwx80NaBkcASfUmSdsSM0PwfDxmqOQMquyqD2Y8u0R87SKpa1sad98Ur+nWBhrVHvHlvODRpg7sD1UruVqlKDZC/xIQCjKY1KkFdDJE84iLPNrh1LyGHA4D0294YYpS02Gbb4TNYPAanvcF3iOF3cJma7vKmWNOofMp/eDCRuCOnc2UBeXjxaZ9x0I9pR7f+kUadF1Smcscc9+z2nBB8RwW7BabK9UZwSQVXYwVEltSAYOg2slXq0w7AEd6f2VmV/0xjKVN5wLhOBnYcrpiJ2o7hxzCN9ZsWg6cFj0yilWm2WY0HKzodATEwEFa/HxPJIIOhBtZr5K5rzojrYw0DOq1euYa/xCG+tisAGRjvkjsfC4pX+7mfK9MnWRDj2Bgj3Jse8/bPT79kW+FOlzLKcldCDyaVPvmAH1sFz4zCGQNq7TCKjDRc4/YIb/AGk2k1mhcZC4vOFug1Rh6iLDbWk4IYJlUKRUt5p9rO4wmBMYq0b4qwsac7UL4U3oVq73tSNLBvKl5c1L0dAJP987QHCVIcm7BMBy3i4VUcsrq9RpgBYQQBzJl4/4tn17SX06jSMoA5/hLVasscDpgkbF78f0irWcnM7khdNATpPQAQPaz7LtFgbuRgPDCG33G/E0gs2wg6a6aWo+pOSo6peR/Dbuq0vCr1KWaJpS6kox5aTlDbGYjflqejVcCBjOuGY+SNOSas1TwsTie+o3cEoVLy1OrFZSrBirZuQHIKdhJBPWOdg25lRzi5xkaRqE7ZLaylUbfGZ8ztI0A3TBPBRUGWS7HR8xA5kfExPRYER16Wz6tRr2imBl7pizNa2o601HYPvQNS39xJ2CBziYMIphl6UswqCAyaryGUBjB9akE9rWsr2tBp1cWnotJtQVXkkQ4ty0wgu6vg7YUta81KdUsjhqFNCzqwBE7+ZTPIAz23sSoyrRZeo+YdQNYI7Polq/+y1h9XytYwk7ZO8c/RRVsUph6NFqEGc5KMV1zBiWnN0YxtJ7WBTtzbp8VsRtE49PlBtLHsr0rMx03vMZ0xmcI1k45lSXqvdU8as3ijYKBlbYRBPl1LyNtosN9pslV10jhmNPVNvdVsvi2t8EYDUTGgz/AJEj8KKjiFE3V3L1WMNHkVZ10++dAdPbezLLfQo/62uk7yT0gJcWmvX/AE91YgHB2PqRgI9BiqPFmI0VFFRTcwCNag5ZdoQfnZd/6g20QG/x3R8nYkf1y/ZW0muIyOQ2RvK4w6t4bSzQLCpG6ZK8uzAo4cVDr5SCPWzfiA5I16UIcefMYgnlytN8jFdJCINiCAADXvaTaNik1FUr1ddADNrstB1Vm1UUp0WdQNrHL2kSiXgprpehTOUwDZWq9yE57kUvWJVVUBauUHoTbqUE4qWOOqFPjNZd3zj9sBv902eBpnT4TIqrlMeczmSl/wDap/8A82q4Af2VbxO5KmoX8Nq4Rf3Vj8LDNS6qmqu6qZVLNlVNxO7fn7b2sHCJOAXX4R+njbUrjh96dsipeHUCPM9N2ZSV6Qvm9B3tmveXVHtYMDHRAvyXEaxPos+4lvFOrealSiTkYyJEanVvaZPLezbQbovZq73SVzd2FNZAl+v6v7vfv8utrNddyVA6FRvtT73W0lxb5guJ1XdPiFagWle1LqNFcHzp6HZh+y3SAVsanbmE3agz5HjsO8eoK4VwcHKxVwCFL0GFanEkpoyj9tdxpz1XubMGgxwF30H0cjwz3JljQMWa9+veCCXnEGWR2K67mSC09J6/8jJtDAw3CO4hS/8AUKzCQNhHo4yfUnDgi9fGFYhaZ0JUsdp209h9R62rZ3PY1zpjDJbds/U6Neo2lRyLm3jtxGH3y2ohi2IrSDVXVWcjKg5/169tetrG2eJ5Xsn439/Ketxp2G9aSfNENHx8nYOtS9XZHoU6fmDNqeesFjJ5CTvYFNtgc6/iCg2uz1qljp2cYl0T/wBiTunuVzfbiqilQpuCJSZ3jMPqTJ9u9q/+EtcXVGVAcOpw72KbU9tJtGwsGRbPAGeZIn0QziS5VHqwBIURvzOp/EfK02f9Kr0mnCZKyP8A8ie60WkBowaI9TifhcFwAJ310/CbZj31LxAykemX2k6FKzCkxz/3XXGNDi6J4RwyVhrxTppNOZO8nXnOkeltAPujBZIdAQ6viLnrarqriuLyVLdL7I1Hvpbmv2qAVfu94AlmPoLFFQBXvAItdcVgbR7zbvGK6+g9+xNy0kTFoNUrr6kp34kSWPWJtHjFRfKjqYkx72s2u4LhUIXKYjVkABRPMxtt1gbWkWh7jCsKjjgr9HFEQgg533zEeUfujc+pj0sQV2t396flXFUNX2IY21QQTM8/5Wnx5K7xZX3FPFVS9UrvSyqi3dMihdjsJjlooEa8+tgA3JIOaoXILdb2B8RE2K2sNVIeNVLXv2kD52h1WMlxfsQt725bzHSwvHcTiqXzOK9eqp5j52lz2lSSFxdsQqUmDUqjK0zKmI+u/wDT2oy01KZ8p+uSqHuacEap8RLVn9LoJUP66+R/mNCe7Kx720af6gHCKo+RyOPIhHbXB/eF0ouDfDVq0SeTKGA/1BgT/DYoqWNwww9SOhB90QPpRhh33qpK+FJV1F9ou37eddOUFkA9vfnpDbLSH/63ex9iSiWiq+0OvVHknfHsEVoq2XKppNUUAH7WmFPcMWhh2WTtMWz/APwp5dAd0OXLvVeqb+u0mWdoAl8ZYgTtnZwk8EKXBb0tXxCKbsoZyBVQkgCDAUkyARA7drEtNhcKVwH39TksCy163+X/AJTheIknPZGwxnhwQPFGqrVYVFZGnVTIjtalyrQaGGftZ9stFStWdUcIvGV3WOtk4CUvu26R6LiZtKhQV97VULqk0bWlcrtDe3LlcpNtaVy5vfK3LlQnW3LlPQOsWlcvLwxtxJUqsDaqhfeIbWkhSvUYkgHaRaC4rpUCKCGnksj+JR+BNuULym5t0lTK4q72glQvGUZQeZZh8gsfibQuXIX8D+doXLlrcVy8226fzFoXLgm3SuXoY9Tabztq5XsPvjoHysRI/CevrYVYklsk8ytT9OtdWgyqaZiRsBynanjgBReqbi8AVRSyhMwkqDm0B3jQQCYGsRJtvNr1PCa6cTPwlKbiW4r/2Q==' style='width: 200px; height: 210px;'/>" +
                                        "</div>"+
                                        "<div class='col-md-6' style='width: 368px; height: 210px; text-align: center'>" +
                                            "<span>Details</span>"+
                                            "<div>" +
                                                "<table class='table table-bordered'>" +
                                                    "<thead>" +
                                                        "<tr>"+
                                                            "<td>ID</td>" +
                                                            "<td>Name</td>"+
                                                            "<td>DisplayName</td>"+
                                                            "<td>Activate</td>"+
                                                            "<td>Availability</td>"+
                                                        "</tr>"+
                                                    "</thead>"+
                                                    "<tbody>" +
                                                        "<tr>" +
                                                            "<td>"+ data[0] +"</td>"+
                                                            "<td>"+ data[1] +"</td>"+
                                                            "<td>"+ data[2] +"</td>"+
                                                            "<td>"+ data[3] +"</td>"+
                                                            "<td>"+ data[4] +"</td>"+
                                                        "</tr>"+
                                                    "</tbody>"+
                                                "</table>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                            "</div>";

                $('div.modal-body').html(table);

            });


        });





    </script>
@stop