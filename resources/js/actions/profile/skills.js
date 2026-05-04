export default function skills(){
    const button_create_skills = document.getElementById('button_create_skills');
    const form_create_skills = document.getElementById('form_create_skills');
    const view_skills = document.getElementById('view_skills');

    if (button_create_skills) {
        button_create_skills.addEventListener('click' , function() {
            if (form_create_skills.classList.contains('hidden')) {
                form_create_skills.classList.remove('hidden');
                view_skills.classList.add('hidden');
            }else{
                form_create_skills.classList.add('hidden');
                view_skills.classList.remove('hidden');
            }
        })
    }
    for (let index = 1; index <= skills_counter; index++) {
        const editBtn = document.getElementById(`button_edit_skills_${index}`);
        const editForm = document.getElementById(`form_edit_skills_${index}`);
        if (editBtn && editForm) {
            editBtn.addEventListener('click' , function() {
                if (editForm.classList.contains('hidden')) {
                    editForm.classList.remove('hidden');
                    if (form_create_skills) form_create_skills.classList.add('hidden');
                    if (view_skills) view_skills.classList.add('hidden');
                }else{
                    editForm.classList.add('hidden');
                    if (view_skills) view_skills.classList.remove('hidden');
                }
            })
        }
    }
}
