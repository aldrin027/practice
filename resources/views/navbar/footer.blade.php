
<div class="footer">
    <div  class="chatToggle" >
        {!! Form::textarea('message', null, ['class' => 'msgarea', 'id' => 'msgarea', 'style' => 'display:none;', 'disabled']) !!}
        {!! Form::text('text', null, ['class' => 'textInput', 'id' => 'txtInput', 'style' => 'display:none']) !!}
        <button style="width: 250px;" id="chatTab">Chat tab <span class="glyphicon glyphicon-menu-up" id="arrow"></span></button>
    </div>
</div>