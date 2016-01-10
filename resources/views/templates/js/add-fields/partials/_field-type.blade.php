<select name="fields[@{{field.id}}][type]" class="form-control" v-model="field.type">
    <template v-for = "valid_field in form.valid_fields">
        <option v-if="valid_field == field.type" value="@{{valid_field}}" selected>@{{capitalizeString(valid_field)}}</option>
        <option v-else value="@{{valid_field}}">@{{capitalizeString(valid_field)}}</option>
    </template>
</select>