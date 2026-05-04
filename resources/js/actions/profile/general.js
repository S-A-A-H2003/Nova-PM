export default function general(){
    const share_link_profile = document.getElementById('shere_link_profile');
    const view_link_profile = document.getElementById('view_link_profile');
    const copy_link_profile = document.getElementById('copy_link_profile');
    const link_profile = document.getElementById('link_profile');

    if (share_link_profile && view_link_profile) {
        share_link_profile.addEventListener('click' , function() {
            view_link_profile.classList.toggle('hidden');
        })
    }

    if (copy_link_profile && link_profile) {
        copy_link_profile.addEventListener('click' , function() {
            navigator.clipboard.writeText(link_profile.href);
            Swal.fire({
                title: 'OK!',
                text: 'Copied',
                icon: 'success',
                confirmButtonColor: '#7c3aed'
            });
        })
    }
}
