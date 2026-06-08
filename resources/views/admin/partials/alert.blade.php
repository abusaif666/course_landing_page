 @if (session('success'))
      <script>
          Swal.fire({
              toast: true,
              position: 'top-end',
              icon: 'success',
              title: '{{ session('success') }}',
              background: '#198754',
              color: '#ffffff',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true
          });
      </script>
  @endif

  @if (session('error'))
      <script>
          Swal.fire({
              toast: true,
              position: 'top-end',
              icon: 'error',
              title: '{{ session('error') }}',
              background: '#dc3545',
              color: '#ffffff',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true
          });
      </script>
  @endif
