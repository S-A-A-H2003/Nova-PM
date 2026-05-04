export default function overview(){
    const button_edit_overview = document.getElementById('button_edit_overview');
    const button_edit_overview_other = document.getElementById('button_edit_overview_other');
    const view_overview = document.getElementById('view_overview');
    const form_edit_overview = document.getElementById('form_edit_overview');
    const button_read_more = document.getElementById('button_read_more');
    const read_more = document.getElementById('read_more');


    if (button_edit_overview) {
        button_edit_overview.addEventListener('click' , function() {
            if (form_edit_overview && view_overview) {
                if (form_edit_overview.classList.contains('hidden')) {
                    form_edit_overview.classList.remove('hidden');
                    view_overview.classList.add('hidden');
                }else{
                    form_edit_overview.classList.add('hidden');
                    view_overview.classList.remove('hidden');
                }
            }
        })
    }
    if (button_edit_overview_other) {
        button_edit_overview_other.addEventListener('click' , function() {
            if (form_edit_overview && view_overview) {
                if (form_edit_overview.classList.contains('hidden')) {
                    form_edit_overview.classList.remove('hidden');
                    view_overview.classList.add('hidden');
                }else{
                    form_edit_overview.classList.add('hidden');
                    view_overview.classList.remove('hidden');
                }
            }
        })
    }

    if (button_read_more && read_more) {
        button_read_more.addEventListener('click' , function() {
            if (read_more.classList.contains('hidden')) {
                read_more.classList.remove('hidden');
                button_read_more.classList.add('hidden');
            }
        })
    }
}
