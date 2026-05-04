export default function education(){
    const button_create_education = document.getElementById('button_create_education');
    const form_create_education = document.getElementById('form_create_education');
    const view_education = document.getElementById('view_education');


    if (button_create_education) {
        button_create_education.addEventListener('click' , function() {
            if (form_create_education.classList.contains('hidden')) {
                form_create_education.classList.remove('hidden');
                view_education.classList.add('hidden');
            }else{
                form_create_education.classList.add('hidden');
                view_education.classList.remove('hidden');
            }
        })
    }

    for (let index = 1; index <= education_counter; index++) {
        const editBtn = document.getElementById(`button_edit_education_${index}`);
        const editForm = document.getElementById(`form_edit_education_${index}`);
        if (editBtn && editForm) {
            editBtn.addEventListener('click' , function() {
                if (editForm.classList.contains('hidden')) {
                    editForm.classList.remove('hidden');
                    if (form_create_education) form_create_education.classList.add('hidden');
                    if (view_education) view_education.classList.add('hidden');
                }else{
                    editForm.classList.add('hidden');
                    if (view_education) view_education.classList.remove('hidden');
                }
            })
        }
    }
}
