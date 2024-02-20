@extends('frontend.index')
@section('title','payment')
@section("content")

<style>
        body {
            background-color: #fff;
            color: #212529;
        }

        .blue-header {
            background-color: #0d6efd;
            color: #fff;
            padding: 1rem;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .step-indicator .step {
            width: 33.33%;
            text-align: center;
        }

        .step-indicator .step.active {
            font-weight: bold;
        }

        .payment-details {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: .25rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: .5rem;
        }
        #drop-zone {
            border: 2px dashed #0077ff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
    </style>



<div class="container-fluid ">
    <div class="row">
        <div class="col-md-6">
            <div class="p-5">
                <h2>Share&Care</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero in nulla aliquet, id vehicula libero consectetur.</p>
                <p>Integer consectetur eros a diam fermentum ultricies. Cras blandit sem non magna faucibus bibendum.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="m-6">
                <div class="container">
                    <div class="step-indicator  mb-3">
                        <div class="step active">Check Out</div>
                        <div class="step">Payment</div>
                        <div class="step">Confirmation</div>
                    </div>
                    <div class="payment-details mb-3">
                        <p> <strong> [WARNING] Submitting Fake Payment Screenshot won't get you access (payments are verified manually)!</strong></p>
                        <h2>Payment Details</h2>
                        <p>Bank Name: [Bank Name]</p>
                        <p>Account Name: [Account Name]</p>
                        <p>Account Number: [Account Number]</p>
                        <form>
                            <div class="form-group mb-3">
                                <label for="amount">Amount to Pay:</label>
                                <input type="number" class="form-control" id="amount" name="amount" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="payment-method">Payment Method:</label>
                                <select class="form-control" id="payment-method" name="payment-method" required>
                                    <option value="">Select a payment method</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="container mt-5">
                                <h1>Secure File Upload</h1>

                                <button id="file-selector-button" class="btn btn-primary mb-3">Select Files</button>

                                <div id="drop-zone" class="mb-5">
                                    <h4>Drag and drop your files here (optional)</h4>
                                    <p>Only secure upload methods will be used.</p>
                                </div>

                                <div id="selected-files"></div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <h2>Draggable Items</h2>
                                    <div class="draggable">Item 1</div>
                                    <div class="draggable">Item 2</div>
                                    <div class="draggable">Item 3</div>
                                </div>
                                <div class="col-md-6">
                                    <h2>Drop Zone</h2>
                                    <div class="droppable"></div>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2ePHKX3ScGbBi1pCiGHb5EHbinSXqzhgszEegYGROnwQjTjsM8n4gRx+8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/recmY5Czb6ZWsDwBFg1h1CStRGZn3lVRnN9AW7jMuonwXCuqU5vRUcsgbLLiz4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4hNqVsJelAZqVZqlLft9T0LPhphbC+GZnQGzdMbgBK1N5ylYVgfBgGZqxHNA+WYU" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Placeholder for server-side upload script URL
        const uploadUrl = 'https://your-server/upload';

        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.multiple = true; // Allow multiple file selection
        fileInput.style.display = 'none'; // Hide the input visually

        document.getElementById('file-selector-button').addEventListener('click', () => {
            fileInput.click(); // Trigger file selection dialog
        });

        fileInput.addEventListener('change', () => {
            const files = fileInput.files;

            // Handle multiple file selection here, e.g., display file names or preview images

            // Use secure upload method, for example:
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                fetch(uploadUrl, {
                    method: 'POST',
                    body: new FormData().append('file', file)
                })
                .then(response => response.json())
                .then(data => {
                    // Handle successful upload response (e.g., display status)
                    const listItem = $('<li>').text(file.name + ' uploaded');
                    $('#selected-files').append(listItem);
                })
                .catch(error => {
                    // Handle upload error (e.g., display error message)
                    console.error('Upload failed:', error);
                });
            }
        });

        $('#drop-zone').on('dragleave dragover dragenter drop', function(e) {
            // Handle drag-and-drop functionality as before, using secure methods
        });
    </script>


</script>

@endsection
