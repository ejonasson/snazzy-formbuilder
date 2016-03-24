
<ul class="field-rules">
    <li class="field-rule">
        <input 
            type="checkbox" 
            name="fields[@{{field.id}}][rules][required]"
            v-model="field.rules.required"
            id="fields[@{{field.id}}][rules][required]"
        > 
        <label for="fields[@{{field.id}}][rules][required]">Required</label>
    </li>

</ul>