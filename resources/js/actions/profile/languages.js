export default function languages(){
    const button_create_languages = document.getElementById('button_create_languages');
    const form_create_languages = document.getElementById('form_create_languages');
    const view_languages = document.getElementById('view_languages');

    if (button_create_languages) {
        button_create_languages.addEventListener('click' , function() {
            if (form_create_languages.classList.contains('hidden')) {
                form_create_languages.classList.remove('hidden');
                view_languages.classList.add('hidden');
            }else{
                form_create_languages.classList.add('hidden');
                view_languages.classList.remove('hidden');
            }
        })
    }
    for (let index = 1; index <= languages_counter; index++) {
        const editBtn = document.getElementById(`button_edit_languages_${index}`);
        const editForm = document.getElementById(`form_edit_languages_${index}`);
        if (editBtn && editForm) {
            editBtn.addEventListener('click' , function() {
                if (editForm.classList.contains('hidden')) {
                    editForm.classList.remove('hidden');
                    if (form_create_languages) form_create_languages.classList.add('hidden');
                    if (view_languages) view_languages.classList.add('hidden');
                }else{
                    editForm.classList.add('hidden');
                    if (view_languages) view_languages.classList.remove('hidden');
                }
            })
        }
    }
}
