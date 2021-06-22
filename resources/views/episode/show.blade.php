@extends('landing')

@section('title', 'Confirm Episode')

@section('body')
    
    <script type="text/javascript">
        function closeWindow() {
            window.open('','_parent','');
            window.close();
        }
        var episode = {!! json_encode($episode) !!}
    </script>

    <form class="form-horizontal" id="episode_form" style="padding: 1em 3em 1em 3em; width: 70%; margin: auto" >
        <div class="modal-content" >
            <div class="modal-header label-warning" style="padding: 1em 3em 1em 3em">
                <b style="font-size: 14px;color: white;letter-spacing: 0.5px;">Episode Information</b>
            </div>

            <div class="panel panel-default" style="margin: 1em 3em 1em 3em">
            <table class="table table-striped table-hover table-bordered" style="letter-spacing: 0.3px;">
                <tbody>
                    <tr>
                        <th width="10%" class="warning">MRN</th>
                        <td>{{$episode->mrn}}</td>
                    </tr>
                    <tr>
                        <th class="warning">Episode</th>
                        <td>{{$episode->episno}}</td>
                    </tr>
                    <tr>
                        <th class="warning">Date</th>
                        <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $episode->reg_date)->format("d-m-Y")}}</td>
                    </tr>
                    <tr>
                        <th class="warning">Doctor</th>
                        <td>{{$episode->admdoctor}}</td>
                    </tr>
                    <tr>
                        <th class="warning">Case</th>
                        <td id="dob">{{$episode->case_code}}</td>
                    </tr>
                    <tr>
                        <th class="warning">Source</th>
                        <td>{{$episode->admsrccode}}</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

            <div class="modal-footer">
                <button id="btn_register_close" type="button" class="btn btn-default" onclick="closeWindow();return false;">Confirm</button>
            </div>
        </div>
    </form>

@endsection

@section('script')
    <script type="text/javascript" src="js/episode.js"></script>
@endsection