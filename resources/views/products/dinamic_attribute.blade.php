
<button type="button" id ="add_fields" name="add_fields">Добавить атрибуты</button>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>

<script type="text/javascript">
    var i = 0;
    $("#add_fields").click(function(){
        $("#attributes").append('<tr>' +
            '<td><input type="text" name="attr_key[]" placeholder="Название атрибута" class="form-control" /></td>' +
            '<td><input type="text" name="attr_value[]" placeholder="Значение атрибута" class="form-control" /></td>' +
            '</tr>');
    });
</script>
