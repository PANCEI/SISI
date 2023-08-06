// untuk delete mark 
let deletemark=$('.deletemark').on('click',function(){
let id=$(this).data('menuid');
let url=$(this).data('base');
let active=$(this).data('cek');
let idm=$(this).data('idm');
let createdby=$(this).data('createdby');
$.ajax({
    url:url+'menu/cek',
    type:'post',
    data:{
        active:active,
        id:id,
        idm:idm,
        createdby:createdby
    },
    success:function(){
        location.reload();
    }
})
})
// akhir delete marak