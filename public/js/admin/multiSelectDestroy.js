$(function (e){
    $("#chkCheckAll").click(function (){
        $(".checkBoxClass").prop('checked',$(this).prop('checked'));
    });

    $('#deleteAllSelectedRecords').click(function (e){
        e.preventDefault();
        var allids = [];
        $("input:checkbox[name=ids]:checked").each(function (){
            allids.push($(this).val());
        });

        $.ajax({
            url:"{{route('admin.users.destroySelected')}}",
            type:'DELETE',
            data:{
                ids:allids,
                _token:$("input[name=_token]").val()
            },
            success:function (response)
            {
                $.each(allids,function (key,val){
                    $('#sid'+val).remove();
                });
            }
        })
    });
});
