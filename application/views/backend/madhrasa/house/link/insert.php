<div class="modal-body">
    <div class="portlet light form-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-social-dribbble font-green"></i>
                <span class="caption-subject font-green bold uppercase">House Registration</span>
            </div>
        </div>

        <style>
            /* Set  the size of the div element that contains the map */
            #map {
                height: 400px;
                /* The height is 400 pixels */
                width: 100%;

            }

            #description {
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
            }

            #infowindow-content .title {
                font-weight: bold;
            }

            #infowindow-content {
                display: none;
            }

            #map #infowindow-content {
                display: inline;
            }

            .pac-card {
                margin: 10px 10px 0 0;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                background-color: #fff;
                font-family: Roboto;
            }

            #pac-container {
                padding-bottom: 12px;
                margin-right: 12px;
            }

            .pac-controls {
                display: inline-block;
                padding: 5px 11px;
            }

            .pac-controls label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
            }

            #pac-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 400px;
            }

            #pac-input:focus {
                border-color: #4d90fe;
            }

            #title {
                color: #fff;
                background-color: #4d90fe;
                font-size: 25px;
                font-weight: 500;
                padding: 6px 12px;
            }

            #target {
                width: 345px;
            }
        </style>


        <div class="form-group">
            <!--The div element for the map -->
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <br>
            <br>
            <div id="map"></div>

        </div>



        <script>
            // Initialize and add the map
            // 
            function initMap() {

                var map = new google.maps.Map(document.getElementById('map'),

                    {
                        center: new google.maps.LatLng(35.137879, -82.836914),
                        zoom: 1,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }); // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');


                var searchBox = new google.maps.places.SearchBox(input);
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                    input); // Bias the SearchBox results towards current map's viewport. 
                map.addListener('bounds_changed', function () {
                    searchBox.setBounds(map.getBounds());
                });

                var infowindow = new google.maps.InfoWindow();

                var
                    markers = []; // Listen for the event fired when the user selects a prediction and retrieve // more details for that place. 
                searchBox.addListener('places_changed', function () {
                    var places = searchBox.getPlaces();


                    if (places.length == 0) {
                        return;
                    } // Clear out the old markers. 
                    markers.forEach(function (marker) {
                        marker.setMap(null);
                    });
                    markers = []; // For each place, get the icon, name and location. 
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }


                        var myMarker = new google.maps.Marker({
                            position: place.geometry.location,
                            draggable: true
                        });

                        google.maps.event.addListener(myMarker, 'dragend', function (evt) {

                            $('#Latitude').val(evt.latLng.lat());

                            $('#long').val(evt.latLng.lng());

                        });

                        google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
                            $('#Latitude').val(evt.latLng.lat());

                            $('#long').val(evt.latLng.lng());
                        });

                        map.setCenter(myMarker.position);
                        myMarker.setMap(map);



                        if (place.geometry.viewport) { // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);
                });





            }

            myMarker = '';
        </script>
        <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=<?=$this->config->item('GoogleAPIKey')?>&callback=initMap&libraries=places">
        </script>




        <!-- <div id="current">Nothing yet...</div> -->

        <style>
            #map_canvas {
                width: 980px;
                height: 500px;
            }

            #current {
                padding-top: 25px;
            }
        </style>






        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="<?=base_url('admin/user/admin/admin/insert')?>" id="InsertForm"
                class="form-horizontal form-bordered" method="post">
                <div class="form-body">



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="validation_RegNo_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">രെജിസ്ട്രേഷൻ നമ്പർ <span
                                        class="required" aria-required="true"> * </span></label>

                                <div class="col-md-6">

                                    <input class="form-control" name="RegNo" id="RegNo" placeholder="രെജിസ്ട്രേഷൻ നമ്പർ"
                                        autocomplete="off">
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group" id="validation_Name_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">കുടുംബ നാഥന്റെ പേര്
                                    <span class="required" aria-required="true"> * </span> </label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="Name" name="Name"
                                        placeholder="കുടുംബ നാഥന്റെ പേര് " autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group" id="validation_Address_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">അഡ്രസ്സ്<span
                                        class="required" aria-required="true"> * </span> </label>
                                <div class="col-md-6 ">
                                    <textarea class="form-control" id="Address" name="Address" rows="3"></textarea>



                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="validation_WardNo_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">വാർഡ് നമ്പർ
                                    <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="WardNo" name="WardNo"
                                        placeholder="വാർഡ് നമ്പർ " autocomplete="off">
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group" id="validation_HouseNo_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">വീട് നമ്പർ
                                    <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="HouseNo" name="HouseNo"
                                        placeholder="വീട് നമ്പർ" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="validation_MobNo_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">മൊബൈൽ നമ്പർ
                                    <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="MobNo" name="MobNo"
                                        placeholder="മൊബൈൽ നമ്പർ" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group" id="validation_WhatsappNo_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">വാട്സ്ആപ്പ് നമ്പർ
                                    <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="WhatsappNo" name="WhatsappNo"
                                        placeholder="വാട്സ്ആപ്പ് നമ്പർ" autocomplete="off">
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group" id="validation_Occupation_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">കുടുംബ നാഥന്റെ തൊഴിൽ
                                </label>

                                <div class="col-md-6">

                                    <input class="form-control" name="Occupation" id="Occupation"
                                        placeholder="കുടുംബ നാഥന്റെ തൊഴിൽ" autocomplete="off">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="validation_NoOfmembers_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">കുടുംബത്തിന്റെ അംഗസംഖ്യ
                                </label>

                                <div class="col-md-6">


                                    <input class="form-control" name="NoOfmembers" id="NoOfmembers"
                                        placeholder="കുടുംബത്തിന്റെ അംഗസംഖ്യ" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="validation_IsStudy_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">നിലവിൽ ആരെങ്കിലും
                                    മദ്രസയിൽ പഠിക്കുന്നുണ്ടോ ? <span class="required" aria-required="true"> *
                                    </span></label>
                                <div class="col-md-6 ">


                                    <div class="mt-radio-inline">

                                        <input type="radio" name="IsStudy"
                                            onclick="madrasaqualificationcheck(this.value)" value="0" />ഇല്ല

                                        <input type="radio" name="IsStudy"
                                            onclick="madrasaqualificationcheck(this.value)" id='madrasaqualification'
                                            value="1" /> ഉണ്ട്






                                    </div>
                                </div>

                            </div>


                            <div id="madrasaqualificationform" style="display:none">
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">എത്ര ആളുകൾ ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="NoOfStudents" id="NoOfStudents"
                                            placeholder="എത്ര ആളുകൾ " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">ആൺ എത്ര ? <span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="MaleStudent" id="MaleStudent"
                                            placeholder="ആൺ എത്ര " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">പെൺ എത്ര ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="FemaleStudent" id="FemaleStudent"
                                            placeholder="പെൺ  എത്ര " autocomplete="off">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group" id="validation_IsAdmision_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">
                                    അടുത്ത അധ്യയന വര്ഷം പുതുതായി കുട്ടികളെ ചേർക്കാനുണ്ടോ ? <span class="required"
                                        aria-required="true"> * </span></label>
                                <div class="col-md-6 ">


                                    <div class="mt-radio-inline">

                                        <input type="radio" name="IsAdmision" onclick="personcheck(this.value)"
                                            value="0" />ഇല്ല

                                        <input type="radio" name="IsAdmision" onclick="personcheck(this.value)"
                                            id='madrasaqualification' value="1" /> ഉണ്ട്






                                    </div>
                                </div>

                            </div>


                            <div id="personcheck" style="display:none">
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">എത്ര ആളുകൾ ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="NoOfAdmision" id="NoOfAdmision"
                                            placeholder="എത്ര ആളുകൾ " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">ആൺ എത്ര ? <span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="MaleAdmision" id="MaleAdmision"
                                            placeholder="ആൺ എത്ര " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">പെൺ എത്ര ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="FemaleAdmision" id="FemaleAdmision"
                                            placeholder="പെൺ  എത്ര " autocomplete="off">
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="validation_IsOldstundents_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">പൂർവ വിദ്യാര്ഥികളായിട്ട്
                                    ആരെങ്കിലും ഉണ്ടോ ?<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6 ">


                                    <div class="mt-radio-inline">

                                        <input type="radio" name="IsOldstundents" onclick="oldstudentscheck(this.value)"
                                            value="0" />ഇല്ല

                                        <input type="radio" name="IsOldstundents" onclick="oldstudentscheck(this.value)"
                                            id='madrasaqualification' value="1" /> ഉണ്ട്






                                    </div>
                                </div>

                            </div>


                            <div id="oldstudentscheck" style="display:none">
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">എത്ര ആളുകൾ ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="NoOfOldStudents" id="NoOfOldStudents"
                                            placeholder="എത്ര ആളുകൾ " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">ആൺ എത്ര ? <span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="MaleOldStudent" id="MaleOldStudent"
                                            placeholder="ആൺ എത്ര " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">പെൺ എത്ര ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input type="number" class="form-control" name="FemaleOldStudent"
                                            id="FemaleMaleOldStudent" placeholder="പെൺ  എത്ര " autocomplete="off">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group" id="validation_Feedback_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">അഭിപ്രായം<span
                                        class="required" aria-required="true"> * </span> </label>
                                <div class="col-md-6 ">
                                    <textarea class="form-control" id="Feedback" name="Feedback" rows="3"></textarea>



                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="modal-footer">
                        <center>
                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn green" name='submit' id="insert" value="Save changes">
                        </center>
                    </div>

                </div>
        </div>



        </form>
    </div>
</div>



<script>

    
function madrasaqualificationcheck(val)
{ 

if(val=='1')
{
    $("#madrasaqualificationform").css("display", "");
}
else
{
    $("#madrasaqualificationform").css("display", "none");
}
  
}


function personcheck(val)
{ 

if(val=='1')
{
    $("#personcheck").css("display", "");
}
else
{
    $("#personcheck").css("display", "none");
}
  
}
function oldstudentscheck(val)
{ 

if(val=='1')
{
    $("#oldstudentscheck").css("display", "");
}
else
{
    $("#oldstudentscheck").css("display", "none");
}
  
}

  
var flag;
    $("#insert").click(function (e) {

        e.preventDefault();

        var base_url = '<?=base_url()?>';

        var post_data = $("#InsertForm").serialize();

        var me = $(this);

        if (me.data('requestRunning')) {
            alert('Please Wait Your request is processing');
            return;
        }
        me.data('requestRunning', true);



        $.ajax({
            url: base_url + 'backend/madhrasa/house/house/insert',
            type: 'POST',
            dataType: "json",
            async: false,
            data: post_data + "&submit=true",
            success: function (data) {

                window.location.href = base_url + 'backend/madhrasa/house/house';
                flag = false;
                //location.reload();

            },
            error: function (jqXhr) {

                var json = $.parseJSON(jqXhr.responseText);

                flag = true;
                me.data('requestRunning', false);


                if (typeof json.RegNo != 'undefined') {

                    $("#validation_RegNo_insert").addClass("has-error");

                    $('#error_RegNo_insert').remove();

                    $('#validation_RegNo_insert .col-md-7').append(
                        "<span class='help-block' id='error_RegNo_insert'>" + json.RegNo +
                        "</span>");
                } else {
                    $("#validation_RegNo_insert").removeClass("has-error");

                    $('#error_RegNo_insert').remove();

                    $("#validation_RegNo_insert").addClass("has-success");


                }



                if (typeof json.Name != 'undefined') {

                    $("#validation_Name_insert").addClass("has-error");

                    $('#error_Name_insert').remove();

                    $('#validation_Name_insert .col-md-7').append(
                        "<span class='help-block' id='error_Name_insert'>" + json.Name +
                        "</span>");


                } else {
                    $("#validation_Name_insert").removeClass("has-error");

                    $('#error_Name_insert').remove();

                    $("#validation_Name_insert").addClass("has-success");


                }

                if (typeof json.Address != 'undefined') {

                    $("#validation_Address_insert").addClass("has-error");

                    $('#error_Address_insert').remove();

                    $('#validation_Address_insert .col-md-7').append(
                        "<span class='help-block' id='error_Address_insert'>" + json.Address +
                        "</span>");


                } else {
                    $("#validation_Address_insert").removeClass("has-error");

                    $('#error_Address_insert').remove();

                    $("#validation_Address_insert").addClass("has-success");


                }


                if (typeof json.WardNo != 'undefined') {

                    $("#validation_WardNo_insert").addClass("has-error");

                    $('#error_WardNo_insert').remove();

                    $('#validation_WardNo_insert .col-md-7').append(
                        "<span class='help-block' id='error_WardNo_insert'>" + json.WardNo +
                        "</span>");


                } else {
                    $("#validation_WardNo_insert").removeClass("has-error");

                    $('#error_WardNo_insert').remove();

                    $("#validation_WardNo_insert").addClass("has-success");
                }
                
                
                
                  if (typeof json.HouseNo != 'undefined') {

                    $("#validation_HouseNo_insert").addClass("has-error");

                    $('#error_HouseNo_insert').remove();

                    $('#validation_HouseNo_insert .col-md-7').append(
                        "<span class='help-block' id='error_HouseNo_insert'>" + json.HouseNo +
                        "</span>");


                } else {
                    $("#validation_HouseNo_insert").removeClass("has-error");

                    $('#error_HouseNo_insert').remove();

                    $("#validation_HouseNo_insert").addClass("has-success");
                }
                
                 
                  if (typeof json.MobNo != 'undefined') {

                    $("#validation_MobNo_insert").addClass("has-error");

                    $('#error_MobNo_insert').remove();

                    $('#validation_MobNo_insert .col-md-7').append(
                        "<span class='help-block' id='error_MobNo_insert'>" + json.MobNo +
                        "</span>");


                } else {
                    $("#validation_MobNo_insert").removeClass("has-error");

                    $('#error_MobNo_insert').remove();

                    $("#validation_MobNo_insert").addClass("has-success");
                }
                
                    if (typeof json.WhatsappNo != 'undefined') {

                    $("#validation_WhatsappNo_insert").addClass("has-error");

                    $('#error_WhatsappNo_insert').remove();

                    $('#validation_WhatsappNo_insert .col-md-7').append(
                        "<span class='help-block' id='error_WhatsappNo_insert'>" + json.WhatsappNo +
                        "</span>");


                } else {
                    $("#validation_WhatsappNo_insert").removeClass("has-error");

                    $('#error_WhatsappNo_insert').remove();

                    $("#validation_WhatsappNo_insert").addClass("has-success");
                }
                
                      if (typeof json.Occupation != 'undefined') {

                    $("#validation_Occupation_insert").addClass("has-error");

                    $('#error_Occupation_insert').remove();

                    $('#validation_Occupation_insert .col-md-7').append(
                        "<span class='help-block' id='error_Occupation_insert'>" + json.Occupation +
                        "</span>");


                } else {
                    $("#validation_Occupation_insert").removeClass("has-error");

                    $('#error_Occupation_insert').remove();

                    $("#validation_Occupation_insert").addClass("has-success");
                }
                
                               if (typeof json.NoOfmembers != 'undefined') {

                    $("#validation_NoOfmembers_insert").addClass("has-error");

                    $('#error_NoOfmembers_insert').remove();

                    $('#validation_NoOfmembers_insert .col-md-7').append(
                        "<span class='help-block' id='error_NoOfmembers_insert'>" + json.NoOfmembers +
                        "</span>");


                } else {
                    $("#validation_NoOfmembers_insert").removeClass("has-error");

                    $('#error_NoOfmembers_insert').remove();

                    $("#validation_NoOfmembers_insert").addClass("has-success");
                }
                
                                  if (typeof json.IsStudy != 'undefined') {

                    $("#validation_IsStudy_insert").addClass("has-error");

                    $('#error_IsStudy_insert').remove();

                    $('#validation_IsStudy_insert .col-md-7').append(
                        "<span class='help-block' id='error_IsStudy_insert'>" + json.IsStudy +
                        "</span>");


                } else {
                    $("#validation_IsStudy_insert").removeClass("has-error");

                    $('#error_IsStudy_insert').remove();

                    $("#validation_IsStudy_insert").addClass("has-success");
                }
                
                
                               if (typeof json.IsAdmision != 'undefined') {

                    $("#validation_IsAdmision_insert").addClass("has-error");

                    $('#error_IsAdmision_insert').remove();

                    $('#validation_IsAdmision_insert .col-md-7').append(
                        "<span class='help-block' id='error_IsAdmision_insert'>" + json.IsAdmision +
                        "</span>");


                } else {
                    $("#validation_IsAdmision_insert").removeClass("has-error");

                    $('#error_IsAdmision_insert').remove();

                    $("#validation_IsAdmision_insert").addClass("has-success");
                }
                
                                  if (typeof json.IsOldstundents != 'undefined') {

                    $("#validation_IsOldstundents_insert").addClass("has-error");

                    $('#error_IsOldstundents_insert').remove();

                    $('#validation_IsOldstundents_insert .col-md-7').append(
                        "<span class='help-block' id='error_IsOldstundents_insert'>" + json.IsOldstundents +
                        "</span>");


                } else {
                    $("#validation_IsOldstundents_insert").removeClass("has-error");

                    $('#error_IsOldstundents_insert').remove();

                    $("#validation_IsOldstundents_insert").addClass("has-success");
                }
                
                                 if (typeof json.Feedback != 'undefined') {

                    $("#validation_Feedback_insert").addClass("has-error");

                    $('#error_Feedback_insert').remove();

                    $('#validation_Feedback_insert .col-md-7').append(
                        "<span class='help-block' id='error_Feedback_insert'>" + json.Feedback +
                        "</span>");


                } else {
                    $("#validation_Feedback_insert").removeClass("has-error");

                    $('#error_Feedback_insert').remove();

                    $("#validation_Feedback_insert").addClass("has-success");
                }
                
            },
            complete: function () {

                if (flag) {
                    me.data('requestRunning', false);
                } else {
                    me.data('requestRunning', true);
                }

            }


        });


    });
 



</script>