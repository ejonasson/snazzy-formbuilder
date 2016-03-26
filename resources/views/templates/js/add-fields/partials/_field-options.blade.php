<template v-for="option in field.fieldOptions">
    <div class="field-options-wrapper field-option-@{{option.id}}">
        <div class="delete-field"><a v-on:click="deleteFieldOption(field.id, option.id)">&times;</a></div>
        <input
        type="text"
        class="form-control field-options"
        name="fields[@{{field.id}}][fieldOptions][@{{option.id}}]"
        v-model="option.text">
    </div>
</template>

<h5>
    <a
    class="btn btn-default add-new" 
    v-on:click="addFieldOption(field.id)">
        Add New
    </a>
</h5>