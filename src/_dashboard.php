<?php
?>

<title>
    Paga Vise | Dashboard personale
</title>

<main class="d-flex align-items-end mt-5">
    <div class="container mt-5">
        <div class="row g-2">
            <div class="col-4 ">
                <div class="container ">
                    <!-- Row saldo vise -->
                    <div class="row shadow-lg rounded-3 bg-white mb-4 pt-2">
                        <span class="text-start text-primary fw-bold">Saldo Vise</span>
                        <hr class="m-0">
                        <div class="fw-bold my-3 mx-2">
                            <span class="fs-1">€
                                <?php
                                if(isset($_user)){

                                    $curl = curl_init();
    
                                    curl_setopt_array($curl, array(
                                        CURLOPT_URL => $_apiURI . '/src/API/API/user_account/getBalance.php?username=' . $_user,
                                        CURLOPT_RETURNTRANSFER => true,
                                        CURLOPT_ENCODING => '',
                                        CURLOPT_MAXREDIRS => 10,
                                        CURLOPT_TIMEOUT => 0,
                                        CURLOPT_FOLLOWLOCATION => true,
                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                        CURLOPT_CUSTOMREQUEST => 'GET',
                                    )
                                    );
    
                                    $response = curl_exec($curl);
                                    curl_close($curl);

                                    $json = json_decode($response);
                                    if(isset($json->balance)){
                                        echo $json->balance;
                                    }else{
                                        echo '0,00';
                                    }
                                }else{
                                    echo '0,00';
                                }

                                ?>
                            </span>
                            <span class="ms-3 fs-6">disponibili</span>
                        </div>
                    </div>

                    <!-- Row bottoni denaro -->
                    <div class="row my-2 text-center">
                        <div class="col-6 px-4">
                            <button class="btn btn btn-outline-primary rounded-3 w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-currency-euro mb-1" viewBox="0 0 16 16">
                                    <path
                                        d="M4 9.42h1.063C5.4 12.323 7.317 14 10.34 14c.622 0 1.167-.068 1.659-.185v-1.3c-.484.119-1.045.17-1.659.17-2.1 0-3.455-1.198-3.775-3.264h4.017v-.928H6.497v-.936c0-.11 0-.219.008-.329h4.078v-.927H6.618c.388-1.898 1.719-2.985 3.723-2.985.614 0 1.175.05 1.659.177V2.194A6.617 6.617 0 0 0 10.341 2c-2.928 0-4.82 1.569-5.244 4.3H4v.928h1.01v1.265H4v.928z" />
                                </svg>
                                <div class="sm-0">Invia denaro</div>

                            </button>
                        </div>
                        <div class="col-6 px-4">
                            <button class="btn btn btn-outline-primary rounded-3 w-100 ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bi bi-cash mb-1" viewBox="0 0 16 16">
                                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                    <path
                                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z" />
                                </svg>
                                <div class="m-0">Richiedi denaro</div>
                            </button>
                        </div>
                    </div>

                    <!-- Row gestione carte -->
                    <div class="row text-center shadow-lg rounded-3 bg-white mt-4 pt-2">
                        <span class="text-start text-primary fw-bold">Le mie carte</span>
                        <hr class="m-0">
                        <span class="d-flex align-items-center my-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2 opacity-50"
                                style="width: 25px; height: 25px;" fill="currentColor" class="bi bi-credit-card-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z" />
                            </svg>
                            <label style="font-size: 12px" class="name_label mb-2" id="label" class="form-check-label"
                                for="exampleCard">
                                Postepay Evolution Connect (**** **** **** 1234)
                            </label>
                        </span>
                        <span class="d-flex align-items-center my-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-2 mb-2 opacity-50"" style=" width: 25px;
                                height: 25px;" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path
                                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg>
                            <label style="font-size: 12px" class="name_label mb-2" id="label" class="form-check-label"
                                for="googlePay">
                                Google Pay
                            </label>
                        </span>
                        <div class="row my-2">
                            <div class="col-6">
                                <button class="btn btn-outline-secondary btn-sm rounded-pill">
                                    Aggiungi una carta

                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-secondary btn-sm rounded-pill">
                                    Gestisci le tue carte

                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-8 ">
                <div class="container" style="min-height: 81vh;">
                    <div class="row shadow-lg rounded-3 bg-white">
                        <span class="text-start text-primary fw-bold pt-2">Attività recenti</span>
                        <hr>

                        <table id="recent-activities-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Seq.</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>2011-04-25</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>2011-07-25</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>2009-01-12</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>41</td>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>2012-03-29</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>55</td>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>2008-11-28</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>2012-12-02</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>46</td>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>2012-08-06</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>50</td>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>2010-10-14</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>26</td>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>2009-09-15</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>2008-12-13</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>2008-12-19</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>23</td>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>2013-03-03</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>2008-10-16</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>2012-12-18</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>54</td>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>2010-03-17</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>37</td>
                                    <td>Michael Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>2012-11-27</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>32</td>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>2010-06-09</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>35</td>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>2009-04-10</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>48</td>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>2012-10-13</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>45</td>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>2012-09-26</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>2011-09-03</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>57</td>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>2009-06-25</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>29</td>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>2011-12-12</td>
                                    <td>$106,450</td>
                                </tr>
                                <tr>
                                    <td>56</td>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sydney</td>
                                    <td>2010-09-20</td>
                                    <td>$85,600</td>
                                </tr>
                                <tr>
                                    <td>36</td>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>2009-10-09</td>
                                    <td>$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>2010-12-22</td>
                                    <td>$92,575</td>
                                </tr>
                                <tr>
                                    <td>51</td>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>2010-11-14</td>
                                    <td>$357,650</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>2011-06-07</td>
                                    <td>$206,850</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>2010-03-11</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>2011-08-14</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>39</td>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sydney</td>
                                    <td>2011-06-02</td>
                                    <td>$95,400</td>
                                </tr>
                                <tr>
                                    <td>40</td>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>2009-10-22</td>
                                    <td>$114,500</td>
                                </tr>
                                <tr>
                                    <td>47</td>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>2011-05-07</td>
                                    <td>$145,000</td>
                                </tr>
                                <tr>
                                    <td>52</td>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>2008-10-26</td>
                                    <td>$235,500</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>2011-03-09</td>
                                    <td>$324,050</td>
                                </tr>
                                <tr>
                                    <td>24</td>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>2009-12-09</td>
                                    <td>$85,675</td>
                                </tr>
                                <tr>
                                    <td>38</td>
                                    <td>Howard Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>San Francisco</td>
                                    <td>2008-12-16</td>
                                    <td>$164,500</td>
                                </tr>
                                <tr>
                                    <td>53</td>
                                    <td>Hope Fuentes</td>
                                    <td>Secretary</td>
                                    <td>San Francisco</td>
                                    <td>2010-02-12</td>
                                    <td>$109,850</td>
                                </tr>
                                <tr>
                                    <td>30</td>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>2009-02-14</td>
                                    <td>$452,500</td>
                                </tr>
                                <tr>
                                    <td>28</td>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>2008-12-11</td>
                                    <td>$136,200</td>
                                </tr>
                                <tr>
                                    <td>34</td>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>2008-09-26</td>
                                    <td>$645,750</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>2011-02-03</td>
                                    <td>$234,500</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>2011-05-03</td>
                                    <td>$163,500</td>
                                </tr>
                                <tr>
                                    <td>31</td>
                                    <td>Sakura Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>Tokyo</td>
                                    <td>2009-08-19</td>
                                    <td>$139,575</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>2013-08-11</td>
                                    <td>$98,540</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>2009-07-07</td>
                                    <td>$87,500</td>
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>2012-04-09</td>
                                    <td>$138,575</td>
                                </tr>
                                <tr>
                                    <td>42</td>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>2010-01-04</td>
                                    <td>$125,250</td>
                                </tr>
                                <tr>
                                    <td>27</td>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>2012-06-01</td>
                                    <td>$115,000</td>
                                </tr>
                                <tr>
                                    <td>49</td>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>2013-02-01</td>
                                    <td>$75,650</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>2011-12-06</td>
                                    <td>$145,600</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>2011-03-21</td>
                                    <td>$356,250</td>
                                </tr>
                                <tr>
                                    <td>25</td>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>2009-02-27</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>33</td>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>2010-07-14</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>43</td>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>2008-11-13</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>2011-06-27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>2011-01-25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Seq.</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#recent-activities-table').DataTable({
                rowReorder: true
            });
        });
    </script>
</main>