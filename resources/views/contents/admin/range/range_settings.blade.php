@extends('layouts.admin')

@section('content')

<style>
    /* Base styles for the button */
    .rc-btn {
        background-size: contain;
        background-repeat: no-repeat;
        border: none;
        background-color: transparent;
        cursor: pointer;
        width: 145px;
        height: 52px;
        position: relative;
        transition: background-position 0.3s ease-in-out, color 0.3s ease-in-out;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Enable button state */
    .enable-button {
        background-image: url('http://192.81.219.28/img/admin/enable.png');
        background-position: right;
        color: #38bd48;
    }

    /* Disable button state */
    .disable-button {
        background-image: url('http://192.81.219.28/img/admin/disable.png');
        background-position: left;
        color: #e21d1e;
    }

    /* Active state to control sliding animation */
    .rc-btn.active {
        background-position: right;
    }

    /* Inactive state to control sliding animation */
    .rc-btn.inactive {
        background-position: left;
    }

</style>

<div class="container centralize_container pt-5 ">

    <div class="row pt-5">
        <div class="col-4">
            <div class="rc_card_heading">
                Maintenance Mode
            </div>
            <div class="p-4 rc_card_body d-flex justify-content-center">
                <button style="margin: 0 auto;" type="button" class="toggleButton rc-btn enable-button">Enable</button>
            </div>
        </div>

        <div class="col-4">
            <div class="rc_card_heading">
                Platform Registration
            </div>
            <div class="p-4 rc_card_body d-flex justify-content-center">
                <button style="margin: 0 auto;" type="button"
                    class="toggleButton rc-btn disable-button">Disable</button>
            </div>
        </div>

        <div class="col-4">
            <div class="rc_card_heading">
                Active Red Team CFT
            </div>
            <div class="p-4 rc_card_body d-flex justify-content-center">
                <button style="margin: 0 auto;" type="button" class="toggleButton rc-btn enable-button">Enable</button>
            </div>
        </div>




    </div>



</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.toggleButton');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                if (this.classList.contains('enable-button')) {
                    this.classList.remove('enable-button');
                    this.classList.add('disable-button');
                    this.textContent = 'Disable';
                } else {
                    this.classList.remove('disable-button');
                    this.classList.add('enable-button');
                    this.textContent = 'Enable';
                }
            });
        });
    });

</script>

@endsection
