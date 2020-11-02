
  // Get rid of small loading animation
  [...document.querySelectorAll(".input-location-dependant")].forEach(element =>
    element.classList.toggle("d-none")
  );

  // Function to set multiple attributes at once
  const setAttributes = (el, attrs) => {
    for (var key in attrs) {
      el.setAttribute(key, attrs[key]);
    }
  };

  const toggleLGA = target => {
    let state = target.value,                                                         // Get value of state
      selectLGAOption = ["Please Select LGA..."],                                            // Define this once so as not to repeat it multiple times
      lgaList = {
          EKITINorth: [
                "Ikole",
                "Oye",
                "Ido/Osi",
                "Moba",
                "Ilejemeje"

          ],
          EKITICentral: [
              "Ado Ekiti",
              "Irepodun/Ifelodun",
              "Ijero",
              "Efon",
              "Ekiti West"

          ],
          EKITISouth: [
              "Ekiti South West",
              "Ikere",
              "Emure",
              "Ise/Orun",
              "Gbonyin",
              "Ekiti East"

          ],
          LAGOSCentral: [
              "Lagos Island (Lagos Island West, Lagos Island East)",
              "Lagos Mainland (Lagos Mainland, Yaba)",
              "Apapa (Apapa, Apapa-Iganmu)",
              "Surulere (Surulere, Coker Aguda, Itire-Ikate)",
              "Eti-Osa(Eti-Osa East, Eti-Osa West, Iru Victoria Island, Ikoyi-Obalende)"

          ],
          LAGOSEast: [
              "Kosofe (Kosofe, Ikosi Isheri, Agboyi-Ketu)",
              "Shomolu (Shomolu, Bariga)",
              "Ikorodu (Ikorodu, Ikorodu North, Ikorodu West, Imota, Ijede, Igbogbo-Baiyeku)",
              "Epe (Epe, Eredo, Ikosi Ejinrin)",
              "Ibeju-Lekki (Ibeju, Lekki)",

          ],
          LAGOSWest: [
              "Agege (Agege, Orile-Agege)",
              "Ajeromi/Ifelodun	(Ajeromi, Ifelodun)",
              "Alimosho	(Alimosho, Agbado/Oke-Odo, Ayobo-Ipaja, Egbe-Idimu, Igando-Ikotun, Mosan Okunola)",
              "Amuwo-Odofin	(Amuwo-Odofin, Oriade)",
              "Badagry (Badagry, Badagry West, Olorunda)",
              "Ifako/Ijaiye	(Ifako/Ijaiye, Ojokoro)",
              "Ikeja (Ikeja, Ojodu, Onigbongbo)",
              "Mushin (Mushin, Odi-Olowo)",
              "Oshodi/Isolo	(Ejigbo, Isolo, Oshodi)",
              "Ojo (Ojo, Oto Awori, Iba)"
          ],
          OGUNCentral: [
              "Ifo",
              "Ewekoro",
              "Obafemi/Owode",
              "Abeokuta North",
              "Abeokuta South",
              "Odeda"
          ],
          OGUNEast: [
              "Sagamu",
              "Ikenne",
              "Remo North",
              "Ijebo Ode",
              "Odogbolu",
              "Ijebu North East",
              "Ijebu North",
              "Ijebu East",
              "Ogun Waterside"
          ],
          OGUNWest: [
              "Imeko Afon",
              "Egbado North",
              "Egbado South",
              "Ipokia",
              "Ado-Odo/Ota"
          ],
          ONDONorth: [
              "Akoko North East",
              "Akoko North West",
              "Akoko South East",
              "Akoko South West",
              "Ose",
              "Owo"
          ],
          ONDOCentral: [
              "Akure North",
              "Akure South",
              "Ifedore",
              "Idanre",
              "Ondo East",
              "Ondo West"
          ],
          ONDOSouth: [
              "Ileoluji/Okeigbo",
              "Odigbo",
              "Irele",
              "Okitipupa",
              "Ese-Odo",
              "Ilaje"
          ],
          OSUNCentral: [
              "Boripe",
              "Bolowaduro",
              "Ifelodun",
              "Ila",
              "Ifedayo",
              "Irepodun",
              "Orolu",
              "Odo-Otin",
              "Olorunda",
              "Osogbo"
          ],
          OSUNEast: [
              "Atakunmosa East",
              "Atakunmosa West",
              "Ife North",
              "Ife South",
              "Ife Central",
              "Ife East",
              "Ilesa East",
              "Ilesa West",
              "Obokun",
              "Oriade"
          ],
          OSUNWest: [
              "Ayadaade",
              "Ayedire",
              "Ede North",
              "Ede South",
              "Egbedore",
              "Ejigbo",
              "Irewole",
              "Isokan",
              "Iwo",
              "Ola-Oluwa"
          ],
          OYOCentral: [
              "Ifijio",
              "Akinyele",
              "Egbeda",
              "Ogo Oluwa",
              "Surulere",
              "Lagelu",
              "Oluyole",
              "Ona-Ara",
              "Oyo East",
              "Oyo West",
              "Atiba"
          ],
          OYONorth: [
              "Saki East",
              "Saki West",
              "Atigbo",
              "Irepo",
              "Olorunsogo",
              "Kajola",
              "Iwajowa",
              "Ogbomosho North",
              "Ogbomosho South",
              "Iseyin",
              "Oorelope",
              "Orire",
              "Itesiwaju"
          ],
          OYOSouth: [
              "Ibadan North",
              "Ibadan North East",
              "Ibadan North West",
              "Ibadan South East",
              "Ibadan South West",
              "Ibarapa Central",
              "Ibarapa North",
              "Ibarapa East",
              "Ido"
          ]
      }[state],                                                                       // Ternary switch operator to show list of LGAs based on chosen state
      lgas = [...selectLGAOption, ...Object.values(lgaList)],                         // Join select LGA option with list of LGAs
      form = target.parentElement.parentElement.parentElement.parentElement,          // Get parent up to the forth generation just in case LGA select element is deeply nested
      lgaSelect = form.querySelector(".select-lga"),                                  // Get the LGA select element
      length = lgaSelect.options.length;                                              // Get number of options already existing in LGA select element

    // Clear LGS select element
    for (i = length - 1; i >= 0; i--) {
      lgaSelect.options[i] = null;
    }

    // Populate LGA select element
    lgas.forEach(lga => {
      let opt = document.createElement("option");                                     // Create option element
      opt.appendChild(document.createTextNode(lga));                                  // Append LGA to it
      opt.value = lga;                                                                // Set the value to LGA

      // Make option asking you to select unclickable
      lga.includes("elect")
        ? setAttributes(opt, { disabled: "disabled", selected: "selected" })
        : "";

      // Add this option element to LGA select element
      lgaSelect.appendChild(opt);
    });
  };
