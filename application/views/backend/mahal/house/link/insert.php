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
                            <div class="form-group" id="validation_BranchCode_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">രെജിസ്ട്രേഷൻ നമ്പർ <span
                                        class="required" aria-required="true"> * </span></label>

                                <div class="col-md-6">

                                    <input class="form-control" name="RegNo" id="RegNo" placeholder="രെജിസ്ട്രേഷൻ നമ്പർ"
                                        autocomplete="off">
                                </div>

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group" id="validation_vendor_name_insert">
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
                            <div class="form-group" id="validation_companyId_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">അഡ്രസ്സ്<span
                                        class="required" aria-required="true"> * </span> </label>
                                <div class="col-md-6 ">
                                    <textarea class="form-control" id="Address" name="Address" rows="3"></textarea>



                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="validation_vendor_number_insert">
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

                            <div class="form-group" id="validation_vendor_number_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">വീട് നമ്പർ
                                    <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="HouseNo" name="HouseNo"
                                        placeholder="വീട് നമ്പർ" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="validation_vendor_number_insert">
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

                            <div class="form-group" id="validation_vendor_number_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">വാട്സ്ആപ്പ് നമ്പർ
                                    <span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6">

                                    <input type="text" class="form-control" id="WhatsappNo" name="WhatsappNo"
                                        placeholder="വാട്സ്ആപ്പ് നമ്പർ" autocomplete="off">
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group" id="validation_Contact1_insert">
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
                            <div class="form-group" id="validation_Contact2_insert">
                                <label class="control-label col-md-6" style=" text-align:left;">കുടുംബത്തിന്റെ അംഗസംഖ്യ
                                </label>

                                <div class="col-md-6">


                                    <input class="form-control" name="NoOfmembers" id="NoOfmembers"
                                        placeholder="കുടുംബത്തിന്റെ അംഗസംഖ്യ" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="">
                                <label class="control-label col-md-6" style=" text-align:left;">നിലവിൽ ആരെങ്കിലും
                                    മദ്രസയിൽ പഠിക്കുന്നുണ്ടോ ? <span class="required" aria-required="true"> *
                                    </span></label>
                                <div class="col-md-6 ">


                                    <div class="mt-radio-inline">

                                        <input type="radio" name="IsStudy"
                                            onclick="madrasaqualificationcheck(this.value)" value="No" />ഇല്ല

                                        <input type="radio" name="IsStudy"
                                            onclick="madrasaqualificationcheck(this.value)" id='madrasaqualification'
                                            value="Yes" /> ഉണ്ട്






                                    </div>
                                </div>

                            </div>


                            <div id="madrasaqualificationform" style="display:none">
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">എത്ര ആളുകൾ ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="NoOfStudents" id="NoOfStudents"
                                            placeholder="എത്ര ആളുകൾ " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">ആൺ എത്ര ? <span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="MaleStudent" id="MaleStudent"
                                            placeholder="ആൺ എത്ര " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">പെൺ എത്ര ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="FemaleStudent" id="FemaleStudent"
                                            placeholder="പെൺ  എത്ര " autocomplete="off">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group" id="">
                                <label class="control-label col-md-6" style=" text-align:left;">
                                    അടുത്ത അധ്യയന വര്ഷം പുതുതായി കുട്ടികളെ ചേർക്കാനുണ്ടോ ? <span class="required"
                                        aria-required="true"> * </span></label>
                                <div class="col-md-6 ">


                                    <div class="mt-radio-inline">

                                        <input type="radio" name="IsAdmision" onclick="personcheck(this.value)"
                                            value="No" />ഇല്ല

                                        <input type="radio" name="IsAdmision" onclick="personcheck(this.value)"
                                            id='madrasaqualification' value="Yes" /> ഉണ്ട്






                                    </div>
                                </div>

                            </div>


                            <div id="personcheck" style="display:none">
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">എത്ര ആളുകൾ ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="NoOfAdmision" id="NoOfAdmision"
                                            placeholder="എത്ര ആളുകൾ " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">ആൺ എത്ര ? <span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="MaleAdmision" id="MaleAdmision"
                                            placeholder="ആൺ എത്ര " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">പെൺ എത്ര ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="FemaleAdmision" id="FemaleAdmision"
                                            placeholder="പെൺ  എത്ര " autocomplete="off">
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="col-md-6">

                            <div class="form-group" id="">
                                <label class="control-label col-md-6" style=" text-align:left;">പൂർവ വിദ്യാര്ഥികളായിട്ട്
                                    ആരെങ്കിലും ഉണ്ടോ ?<span class="required" aria-required="true"> * </span></label>
                                <div class="col-md-6 ">


                                    <div class="mt-radio-inline">

                                        <input type="radio" name="IsOldstundents" onclick="oldstudentscheck(this.value)"
                                            value="No" />ഇല്ല

                                        <input type="radio" name="IsOldstundents" onclick="oldstudentscheck(this.value)"
                                            id='madrasaqualification' value="Yes" /> ഉണ്ട്






                                    </div>
                                </div>

                            </div>


                            <div id="oldstudentscheck" style="display:none">
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">എത്ര ആളുകൾ ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="NoOfOldStudents" id="NoOfOldStudents"
                                            placeholder="എത്ര ആളുകൾ " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">ആൺ എത്ര ? <span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="MaleOldStudent" id="MaleOldStudent"
                                            placeholder="ആൺ എത്ര " autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group" id="">
                                    <label class="control-label col-md-6" style=" text-align:left;">പെൺ എത്ര ?<span
                                            class="required" aria-required="true"> * </span></label>

                                    <div class="col-md-6">


                                        <input class="form-control" name="FemaleMaleOldStudent"
                                            id="FemaleMaleOldStudent" placeholder="പെൺ  എത്ര " autocomplete="off">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group" id="validation_companyId_insert">
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

if(val=='Yes')
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

if(val=='Yes')
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

if(val=='Yes')
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
            url: base_url + 'backend/admin/house/house/insert',
            type: 'POST',
            dataType: "json",
            async: false,
            data: post_data + "&submit=true",
            success: function (data) {

                window.location.href = base_url + 'backend/admin/house/house';
                flag = false;
                //location.reload();

            },
            error: function (jqXhr) {

                var json = $.parseJSON(jqXhr.responseText);

                flag = true;
                me.data('requestRunning', false);


                if (typeof json.Admin_number != 'undefined') {

                    $("#validation_Admin_number_insert").addClass("has-error");

                    $('#error_Admin_number_insert').remove();

                    $('#validation_Admin_number_insert .col-md-7').append(
                        "<span class='help-block' id='error_Admin_number_insert'>" + json.Admin_number +
                        "</span>");
                } else {
                    $("#validation_Admin_number_insert").removeClass("has-error");

                    $('#error_Admin_number_insert').remove();

                    $("#validation_Admin_number_insert").addClass("has-success");


                }



                if (typeof json.country_name != 'undefined') {

                    $("#validation_country_name_insert").addClass("has-error");

                    $('#error_country_name_insert').remove();

                    $('#validation_country_name_insert .col-md-7').append(
                        "<span class='help-block' id='error_country_name_insert'>" + json.country_name +
                        "</span>");


                } else {
                    $("#validation_country_name_insert").removeClass("has-error");

                    $('#error_country_name_insert').remove();

                    $("#validation_country_name_insert").addClass("has-success");


                }

                if (typeof json.password != 'undefined') {

                    $("#validation_password_insert").addClass("has-error");

                    $('#error_password_insert').remove();

                    $('#validation_password_insert .col-md-7').append(
                        "<span class='help-block' id='error_password_insert'>" + json.password +
                        "</span>");


                } else {
                    $("#validation_password_insert").removeClass("has-error");

                    $('#error_password_insert').remove();

                    $("#validation_password_insert").addClass("has-success");


                }


                if (typeof json.confirm_password != 'undefined') {

                    $("#validation_confirm_password_insert").addClass("has-error");

                    $('#error_confirm_password_insert').remove();

                    $('#validation_confirm_password_insert .col-md-7').append(
                        "<span class='help-block' id='error_confirm_password_insert'>" + json.confirm_password +
                        "</span>");


                } else {
                    $("#validation_confirm_password_insert").removeClass("has-error");

                    $('#error_confirm_password_insert').remove();

                    $("#validation_confirm_password_insert").addClass("has-success");
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