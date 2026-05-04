export default function summary(){
    const button_create_summary = document.getElementById('button_create_summary');
    const form_create_summary = document.getElementById('form_create_summary');
    const button_edit_summary = document.getElementById('button_edit_summary');
    const form_edit_summary = document.getElementById('form_edit_summary');
    const view_summary = document.getElementById('view_summary');

    if (button_create_summary) {
        button_create_summary.addEventListener('click' , function() {
            if (form_create_summary.classList.contains('hidden')) {
                form_create_summary.classList.remove('hidden');
                if (view_summary) view_summary.classList.add('hidden');
                if (form_edit_summary) form_edit_summary.classList.add('hidden');
            }else{
                form_create_summary.classList.add('hidden');
                if (view_summary) view_summary.classList.remove('hidden');
            }
        })
    }
    if (button_edit_summary && form_edit_summary) {
        button_edit_summary.addEventListener('click' , function() {
            if (form_edit_summary.classList.contains('hidden')) {
                form_edit_summary.classList.remove('hidden');
                if (form_create_summary) form_create_summary.classList.add('hidden');
                if (view_summary) view_summary.classList.add('hidden');
            }else{
                form_edit_summary.classList.add('hidden');
                if (view_summary) view_summary.classList.remove('hidden');
            }
        })
    }
}
