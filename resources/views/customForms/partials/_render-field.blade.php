    
    @foreach($form->fields as $field)
        <div class="form-group">
            <label for="{{$field->id}}">{{$field->name}}</label>
            @if($field->type == 'text')
                <input type="text" name="{{$field->id}}" class="form-control">
            @elseif($field->type == 'select')
                <select name="{{$field->id}}" id="field-{{$field->id}}" class="form-control">
                    @foreach($field->fieldOptions as $option)
                        <option value="{{$option->name}}">{{$option->text}}</option>
                    @endforeach
                </select>
            @endif
        </div>
    @endforeach