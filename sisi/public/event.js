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
// awaltambah akses
let tambahAKkses=$('.akses').on('click',function(){
let menu_id=$(this).data('menuid');
let url=$(this).data('base');
let cek=$(this).data('cek');
let idm=$(this).data('idm');
let date=$(this).data('date');
let created=$(this).data('created');
let module=$(this).data('module');
$.ajax({
    url:url+'akses/AddAkses',
    type:'post',
    data:{
        menu_id:menu_id,
        idm:idm,
        cek:cek,
        date:date,
        created:created,
        module:module
    },
    success:function(){
        location.reload();
    }
})
})
// akhir tambah akses
// data table 

$('#data-table').DataTable();
// akhhi data table 
// delete mark activity
let deletemarkactivity=$('.deletemarkactivity').on('click',function(){
    let id=$(this).data('menuid');
    let url=$(this).data('base');
    let active=$(this).data('cek');
    let idm=$(this).data('idm');
    let createdby=$(this).data('createdby');
    $.ajax({
        url:url+'activity/cek',
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
// akhir delete mark activity