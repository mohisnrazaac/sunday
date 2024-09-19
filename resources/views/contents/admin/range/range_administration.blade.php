@extends('layouts.admin')

@section('content')



<style>
    .btn_factory_reset {
        background-image: url('http://192.81.219.28/img/admin/btn_factory_reset.png');
        background-size: contain;
        background-repeat: no-repeat;
        border: none;
        background-color: transparent;
        cursor: pointer;
        width: 250px;
        height: 46px;
        color: #1ce5df;
        font-size: 15px;
        font-weight: 100;
    }

    .btn_user_reset {
        background-image: url('http://192.81.219.28/img/admin/btn_user_reset.png');
        background-size: contain;
        background-repeat: no-repeat;
        border: none;
        background-color: transparent;
        cursor: pointer;
        width: 250px;
        height: 46px;
        color: white;
        font-size: 15px;
        font-weight: 100;
    }

</style>

<div class="container centralize_container pt-5 ">
    <div class="row pt-5">
        <div class="col-4">
            <div class="rc_card_heading">
                Factory Reset The Cyber Range
            </div>
            <div class="p-2 rc_card_body">
                <span class="d-block heading_danger">Warning!</span>
                <span class="card_body_text ">Resetting the Cyber Range will result in factory defaulting the
                    range<br><br></span>

                <button style="margin: 0 auto " type="submit" class="mt-3 rc-btn btn_factory_reset">Factory Reset the
                    Cyber Range</button>
            </div>
        </div>
        <div class="col-4">
            <div class="rc_card_heading">
                Reset the User's List
            </div>
            <div class="p-2 rc_card_body">
                <span class="d-block heading_danger">Warning!</span>
                <span class="card_body_text ">Resetting the user list will remove all users except the administrative
                    users, but will keep all other cyber range settings</span>

                <button style="margin: 0 auto " type="submit" class="mt-3 rc-btn btn_user_reset">User's List
                    Resetted</button>
            </div>
        </div>
        <div class="col-4">
            <div class="rc_card_heading">
                Reset The Assets List
            </div>
            <div class="p-2 rc_card_body">
                <span class="d-block heading_danger">Warning!</span>
                <span class="card_body_text ">Resetting the asset's list will remove all assets from cyber range, but
                    will keep all other cyber range settings</span>
                <button style="margin: 0 auto " type="submit" class="mt-3 rc-btn btn_factory_reset">Reset The Asset
                    Group</button>
            </div>
        </div>
    </div>
    <div class="row pt-5">

        <div class="col-4">
            <div class="rc_card_heading">
                Reset The Assets Group
            </div>
            <div class="p-2 rc_card_body">
                <span class="d-block heading_danger">Warning!</span>
                <span class="card_body_text ">Resetting the selected Team(s)' Assets will remove all of their respective
                    Assets from the Cyber Range, but will keep all other Cyber Range Settings</span>

                <button style="margin: 0 auto " type="submit" class="mt-3 rc-btn btn_factory_reset">Reset The Assets
                    Group</button>
            </div>
        </div>
        <div class="col-4">
            <div class="rc_card_heading">
                Reset Team Specific Assets
            </div>
            <div class="p-2 rc_card_body">
                <span class="d-block heading_danger">Warning!</span>
                <span class="card_body_text ">Resetting the selected Team(s)' Assets will remove all of their respective
                    Assets from the Cyber Range, but will keep all other Cyber Range Settings</span>

                <button style="margin: 0 auto " type="submit" class="mt-3 rc-btn btn_factory_reset">Reset</button>
            </div>
        </div>
        <div class="col-4">
            <div class="rc_card_heading">
                Reset The Login Logs
            </div>
            <div class="p-2 rc_card_body">
                <span class="d-block heading_danger">Warning!</span>
                <span class="card_body_text ">Resetting the Login Logs will remove all Login Logs from the Cyber Range
                    Datase, but will keep all other Cyber Range Settings</span>

                <button style="margin: 0 auto " type="submit" class="mt-3 rc-btn btn_factory_reset">Reset The Login
                    Logs</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.rc-btn');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                if (this.classList.contains('btn_user_reset')) {
                    this.classList.remove('btn_user_reset');
                    this.classList.add('btn_factory_reset');
                    this.style.backgroundImage = "url('/img/admin/btn_factory_reset.png')";
                } else {
                    this.classList.remove('btn_factory_reset');
                    this.classList.add('btn_user_reset');
                    this.style.backgroundImage = "url('/img/admin/btn_user_reset.png')";
                }
            });
        });
    });

</script>

@endsection
