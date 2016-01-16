<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazuhiro
 * Date: 1/12/16
 * Time: 12:03 PM
 *
 * Language Select Box part.
 * param array $select_box_data
 * param string $element_name
 * param boolean $hide_element_name
 */
?>
@if (empty($default_data))
    <div class="form-group {{ $errors->has($element_name) ? 'has-error' : '' }}">
        <label class="control-label col-sm-2">
            @if (empty($hide_element_name))
                {{ trans("user.{$element_name}") }}
            @endif
        </label>
        <div class="col-sm-4">
            {!! Form::select("{$element_name}[]", $select_box_data, null, ['class' => 'form-control'] ) !!}
            {!! $errors->first($element_name, '<span class="control-label">:message</span>') !!}
        </div>
        <div class="col-sm-2">
            <button class="btn btn-default btn-xs remove-language-btn"><i class="glyphicon glyphicon-remove"></i></button>
        </div>
    </div>
@else
    <?php $loop_num = 0; ?>
    @foreach ($default_data as $default_lang_id => $language_string)
    <div class="form-group {{ $errors->has($element_name) ? 'has-error' : '' }}">
        <label class="control-label col-sm-2">
            @if ($loop_num == 0)
                {{ trans("user.{$element_name}") }}
            @endif
        </label>
        <div class="col-sm-4">
            {!! Form::select("{$element_name}[]", $select_box_data, $default_lang_id, ['class' => 'form-control'] ) !!}
            {!! $errors->first($element_name, '<span class="control-label">:message</span>') !!}
        </div>
        @if ($loop_num != 0)
            <div class="col-sm-2">
                <button class="btn btn-default btn-xs remove-language-btn"><i class="glyphicon glyphicon-remove"></i></button>
            </div>
        @endif
    </div>
    <?php $loop_num++; ?>
    @endforeach
@endif
