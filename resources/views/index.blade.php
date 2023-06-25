<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Send Message</title>
</head>

<body>
    @if (session()->has('success'))
        <div class="d-flex justify-content-center alert alert-success " role="alert">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="d-flex justify-content-center alert alert-danger " role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="container pt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Send Message</h5>
                <form action="/send" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="target" class="form-label">Target</label>
                        <input type="text" class="form-control" id="name" name="target"
                            placeholder="awali nomor tujuan dengan 0, pisahkan dengan koma bila lebih dari satu nomor. contoh 08122443,08121212"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Ketik Pesan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="delay" class="form-label">Delay</label>
                        <input type="number" class="form-control" id="delay" name="delay"
                            placeholder="Delay pesan sebaiknya 2 detik" value="2" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="countryCode" class="form-label">Kode Negara</label>
                        <input type="number" class="form-control" id="countryCode" name="countryCode" rows="3"
                            placeholder="Masukkan 62" value="62" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
