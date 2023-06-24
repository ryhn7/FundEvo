const deleteButtons = document.querySelectorAll('.deleteButton');

deleteButtons.forEach((deleteBtn) => {
    deleteBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const swalWithTailwindButtons = Swal.mixin({
            customClass: {
                confirmButton: 'swal2-confirm inline-block px-6 py-3 mb-4 font-bold text-center uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-[#17ad37] to-[#98ec2d] leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 text-white',
                cancelButton: 'inline-block mx-3 px-6 py-3 mb-4 font-bold text-center uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:scale-102 active:opacity-85 hover:shadow-soft-xs bg-gradient-to-tl from-[#ea0606] to-[#e11d48] leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 text-white',
            },
            buttonsStyling: false,
        });

        swalWithTailwindButtons
            .fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
            })
            .then((result) => {
                if (result.isConfirmed) {
                    deleteBtn.parentElement.submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithTailwindButtons.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
    });
});