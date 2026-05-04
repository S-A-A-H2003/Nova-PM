export default function professional_experience(){
    const button_create_professional_experience = document.getElementById('button_create_professional_experience');
    const form_create_professional_experience = document.getElementById('form_create_professional_experience');
    const view_professional_experience = document.getElementById('view_professional_experience');

    if (button_create_professional_experience) {
        button_create_professional_experience.addEventListener('click' , function() {
            if (form_create_professional_experience.classList.contains('hidden')) {
                form_create_professional_experience.classList.remove('hidden');
                view_professional_experience.classList.add('hidden');
            }else{
                form_create_professional_experience.classList.add('hidden');
                view_professional_experience.classList.remove('hidden');
            }
        })
    }
    for (let index = 1; index <= professional_experience_counter; index++) {
        const editBtn = document.getElementById(`button_edit_professional_experience_${index}`);
        const editForm = document.getElementById(`form_edit_professional_experience_${index}`);
        if (editBtn && editForm) {
            editBtn.addEventListener('click' , function() {
                if (editForm.classList.contains('hidden')) {
                    editForm.classList.remove('hidden');
                    if (form_create_professional_experience) form_create_professional_experience.classList.add('hidden');
                    if (view_professional_experience) view_professional_experience.classList.add('hidden');
                }else{
                    editForm.classList.add('hidden');
                    if (view_professional_experience) view_professional_experience.classList.remove('hidden');
                }
            })
        }
    }
}
