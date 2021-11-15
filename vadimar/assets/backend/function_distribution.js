//#region Html Date
    //Get value from input Date(string) and convert to Date(int)
    var date = $("#dateDis").val()
    var dateformat = new Date(date)

    //Validate if Date(value_input_date).day === 6 (6 = "domingo")
    if(dateformat.getDay() === 6) {
        $("#area-alert-date").removeClass("d-none");
        $("#area-alert-date").addClass("d-block");
    }

    //Validate Change if Date(value_input_date).day === 6 (6 = "domingo")
    $("#dateDis").on( 'change', function() {
        var date = $("#dateDis").val()
        var dateformat = new Date(date)
        if(dateformat.getDay() === 6){
            $("#area-alert-date").removeClass("d-none");
            $("#area-alert-date").addClass("d-block");
        }else{
            $("#area-alert-date").removeClass("d-block");
            $("#area-alert-date").addClass("d-none");
        }
    });

//#endregion

//#region Select2 Form Distribution

    //Set Focus auto load select2

    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });

    //#region Format HTML(select)

        function formatRepo (repo) {
            if (repo.loading) {
                return repo.text;
            }
            var $container = $(
            "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__title'></div>" +
                "<div class='select2-result-repository__description'></div>" +
                "</div>" +
            "</div>"
            );
            if(repo.name == undefined){
                $container.find(".select2-result-repository__title").text(repo.id);
            }else{
                $container.find(".select2-result-repository__title").text(repo.id + ' - ' + repo.name);
            }
            return $container;
        }

    //#endregion

    //#region Select DriverDis

        $("#drivDis").select2({
            width: '100%',
            ajax: {
                url: base_url + '/distribution/searchDriver',
                type: 'POST',
                dataType: 'json',
                async: false,
                delay: 0,
                data: function(params) {
                    return {
                        driverTerm: params.term,
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: false
            },
            placeholder: 'Buscar un conductor',
            templateResult: formatRepo,
            templateSelection: formatRepoSelectionDriv
        });

        //Format Selection
        function formatRepoSelectionDriv (repo) {
            $("#licDis").val(repo.id);
            return repo.name || repo.text;
        }

    //#endregion
    
    //#region Select TransportDis
    
        $('#transDis').select2({
            width: '100%',
            ajax: {
                url: base_url + '/distribution/searchTransport',
                type: 'POST',
                dataType: 'json',
                async: false,
                delay: 250,
                data: function(params) {
                    return {
                        transTerm: params.term,
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: false
            },
            placeholder: 'Buscar un auto',
            textInputLength: 'ss',
            templateResult: formatRepo,
            templateSelection: formatRepoSelectionTrans,
        })

        //Format Selection
        function formatRepoSelectionTrans (repo) {
            $("#plaDis").val(repo.id);
            return repo.name || repo.text;
        }

    //#endregion
 
    //#region Select PersonalDis

        $("#persDis").select2({
            width: '100%',
            ajax: {
                url: base_url + '/distribution/searchPerson',
                type: 'POST',
                dataType: 'json',
                async: false,
                delay: 0,
                data: function(params) {
                    return {
                        persTerm: params.term,
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: false
            },
            placeholder: 'Buscar una persona',
            templateResult: formatRepo,
            templateSelection: formatRepoSelectionPer
        });

        //Format Selection
        function formatRepoSelectionPer (repo) {
            $("#identDis").val(repo.id);
            return repo.name || repo.text;
        }

    //#endregion

    //#region Select AddressDis

        $("#addrDis").select2({
            width: '100%',
            tags: true,
            ajax: {
                url: base_url + '/distribution/searchAddress',
                type: 'POST',
                dataType: 'json',
                async: false,
                delay: 0,
                data: function(params) {
                    return {
                        codbussTerm: $("#codbusDis").val(),
                        addrTerm: params.term,
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: false
            },
            placeholder: 'Buscar una dirección',
            templateResult: formatRepo,
            templateSelection: formatRepoSelectionAddr
        });

        //Format Selection
        function formatRepoSelectionAddr (repo) {
            $("#idaddrDis").val(repo.id);
            if($("#codbusDis").val() != ""){
                $("#distDis").empty().append('<option value="'+repo.desc+'">'+repo.desc+'</option>').val(''+repo.desc+'').trigger('change');
            }else{
            }
        
            return repo.name || repo.text;
        }

    //#endregion

    //#region Select Search or Create Bussiness Name

        $("#busiDis").select2({
            width: '100%',
            tags: true,
            ajax: {
                url: base_url + '/distribution/searchBusiness',
                type: 'POST',
                dataType: 'json',
                async: false,
                delay: 0,
                data: function(params) {
                    return {
                        busiTerm: params.term,
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: false
            },
            placeholder: 'Buscar una Razon Social',
            minimumInputLength: 4,
            templateResult: formatRepo,
            templateSelection: formatRepoSelectionBusi,      
        });

        //Format Selection
        function formatRepoSelectionBusi (repo) {
            if(repo.name === undefined){
                $("#codbusDis").val("");
                $("#ncommDis").val("");
                $("#addrDis").val('').trigger('change')
                $("#idaddrDis").val("");
                $("#distDis").val('').trigger('change')
            }else{
                $("#codbusDis").val(repo.id);
                $("#ncommDis").val(repo.desc);
                $("#addrDis").val('').trigger('change')
                $("#distDis").val('').trigger('change')
            }
            return repo.name || repo.text;
        }

        $('#busiDis').on('change', function(e) {
            if($("#codbusDis").val() == ""){
                $("#ncommDis").attr("disabled",false);
                $("#ncommDis").removeClass("disabled");
                $("#distDis").attr("disabled",false);
                $("#distDis").removeClass("disabled");
            }else{
                $("#ncommDis").attr("disabled",true);
                $("#ncommDis").addClass("disabled");
                $("#distDis").attr("disabled",true);
                $("#distDis").addClass("disabled");
            }
        }) 
        
    //#endregion

    //#region Select DistrictDis

        $("#distDis").select2({
            width: '100%',
            ajax: {
                url: base_url + '/distribution/searchDistrict',
                type: 'POST',
                dataType: 'json',
                async: false,
                delay: 0,
                data: function(params) {
                    return {
                        distTerm: params.term,
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data,
                    };
                },
                cache: false
            },
            placeholder: 'Buscar una direccion',
            templateResult: formatRepo,
            templateSelection: formatRepoSelectionDis
        });

        //Format Selection
        function formatRepoSelectionDis (repo) {
            return repo.id || repo.text;
        }

    //#endregion

//#endregion

//#region Dynamic area Form Distribution

//#region Validate Route Data (LicDis - PlaDis - DateDis)

setInterval(function() {
    if($("#licDis").val().length != 0 && $("#plaDis").val().length != 0){
        $.ajax({
            url: base_url +'/distribution/searchRoute',
            type: 'POST',
            dataType: "json",
            data: {
                dateTerm: $("#dateDis").val(),
                licdrivTerm: $("#licDis").val(),
                platransTerm: $("#plaDis").val(),
            },
            success: function(data) {
                console.log(data);
                var radbtn = $('#rad-button')[0]
                radbtn.innerHTML = ''
                if(data.length > 0) {
                    for(i = 0; i < data.length; i++){
                        var newlabel = document.createElement('label')
                        var state = ''
                        if(data[i]['name'] == 'F'){
                            state = 'disabled'
                        }else{ 
                            state = ''
                        }
                        newlabel.innerHTML = '<input type="radio" checked="true" name="option" value="'+data[i]["id"]+'"'+state+'>N° ' + data[i]["id"] + '</label>'
                        radbtn.appendChild(newlabel)
                        var radios = document.getElementsByName("option");
                    }
                    var popvalrout = parseInt(data.pop()['id']) + 1
                    var createlem = '<label><input type="radio" name="option" value="'+popvalrout+'">N° '+ popvalrout + '</label>'
                    radbtn.insertAdjacentHTML('beforeend', createlem)
                    $("#routDis").val(document.querySelector('input[name="option"]:checked').value)
                }else{
                    var newlabel = document.createElement('label')
                    newlabel.innerHTML = '<input type="radio" checked="true" name="option" value="1"><span class="label-text" required>N° 1</span>'
                    $("#routDis").val("1");
                    radbtn.appendChild(newlabel)
                }
                var radios = document.getElementsByName("option");
                var val = localStorage.getItem('option');
                for(var i=0;i<radios.length;i++){
                    if(radios[i].value == val){
                        radios[i].checked = true;
                    }
                }
                $('input[name="option"').on('change', function(){
                localStorage.setItem('option', $(this).val());
                });
            }
        });
    }
},1000)

    function showValue() {
        alert('Option ' + document.querySelector('input[name="option"]:checked').value + ' selected.');
        console.log('Option ' + document.querySelector('input[name="option"]:checked').value + ' selected.');
    }

//#endregion

//#region Event Onkey TextArea DescDis
/*
    function tacValidate(e) {
        key = (document.all) ? e.keyCode : e.which;
        // Backspace key to delete, always allows
        if (key == 8) { return true; }
        // Input pattern, in this case it only accepts numbers and letters
        patron = /[A-Za-z0-9]/;
        key_finally = String.fromCharCode(key);
        return patron.test(key_finally);
    }
*/
//#endregion