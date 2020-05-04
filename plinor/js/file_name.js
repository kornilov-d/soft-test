function file_name(field) {
    var name=document.getElementById(field).value;
    name=name.split('\\').pop();
    document.getElementById('cab_file').style.display='inline-block';
    document.getElementById('cross').style.display='inline-block';
    document.getElementById('cab_file').value=name;
}
function cross() {
    document.getElementById('cab_file').value='';
    document.getElementById('cab_file').style.display='none';
    document.getElementById('cross').style.display='none';
    document.getElementById('files').value='';
}


function cab_vis(self,flag) {
    if(flag==0) {
        if($( self ).parent().parent().find(".cab_puss").hasClass("unvis")){
        $(self).parent().find(".cab_pus").addClass("unvis");
        $(self).parent().find(".cab_puss").removeClass("unvis");}
        else{
            $(self).parent().find(".cab_puss").addClass("unvis");
            $(self).parent().find(".cab_pus").removeClass("unvis");
        }
    }
    if(flag==1){
        if($( self ).parent().parent().find(".cab_puss").hasClass("unvis")){
            $(self).parent().find(".cab_pus").addClass("unvis");
            $(self).parent().find(".cab_puss").removeClass("unvis");}
        else{
            $(self).parent().find(".cab_puss").addClass("unvis");
            $(self).parent().find(".cab_pus").removeClass("unvis");
        }
    }
}
