<?php
  session_start();
  if(!isset($_SESSION["username"])){
      header("Location: index.php");
      exit;
  }
?>

<!doctype html>
<html id="#top">
<head>
    <meta charset="utf-8">
    <title>Business</title>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/home.css" rel="stylesheet">
    <script src="js/getArticles.js" defer></script>
    <script src="js/newsTheGuardian.js" defer></script>
    <script src="js/buttonLikeDislike.js" defer></script>
    <script src="js/search.js" defer></script>
  </head>
  <body>
    <header class="blog-header">
      <nav class="nav-header">
        <a class="login100-form-logo" href="home.php" data-tooltip="Home">
					<i class="zmdi zmdi-landscape"></i>
        </a>
        <a id="header-link_W" href="#top">Crypto</a>
        <a id="header-link_W" href="stocks.php">Stocks</a>
        <a id="header-link_WO" href="#top" data-tooltip="Back to top">Business</a>
        <a id="header-link_W" href="music.php">Music</a>
        <form class="search-container" name="search">
          <input class="search-input" type="text" placeholder="Search">
        </form>
        <button class="usericon">
          <i class="zmdi zmdi-account-o zmdi-hc-3x" onclick="openNav()"></i>
        </button>
      </nav>
    </header>

    <main class="container">
      <div id="Modal" class="modal">
        <div class="modal-content">
        </div>
      </div>

      <div id="sidenav" class="sidenav">
        <a class="closebutton" onclick="closeNav()">&times;</a>
        <div class="info-sidenav">  
          <div class="user-logo">
            <img id="info" src="img/user-icon.png" alt="user-logo">
          </div>
          <?php
            echo "<span id='nickname'>".$_SESSION["username"]."</span>" 
          ?>
          <span id="reload">
            Reload Articles
            <i class="fa fa-refresh" aria-hidden="true"></i>
          </span> 
          <a href="php/logout.php" class="no-decoration">
            <span>Log Out</span>
          </a>
          <a href="delete.php" class="no-decoration">
            <span>Delete account</span>
          </a>
        </div>
      </div>

      <div class="opacity"></div>

      <div class="articles-and-widget-container">
        <div class="widgets-container">
          <section>
            <div class="widget">
              <!-- https://www.tomorrow.io/weather/widget/ -->
              <script>
                (function(d, s, id) {
                    if (d.getElementById(id)) {
                        if (window.__TOMORROW__) {
                            window.__TOMORROW__.renderWidget();
                        }
                        return;
                    }
                    const fjs = d.getElementsByTagName(s)[0];
                    const js = d.createElement(s);
                    js.id = id;
                    js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";
        
                    fjs.parentNode.insertBefore(js, fjs);
                })(document, 'script', 'tomorrow-sdk');
              </script>
        
              <div class="tomorrow"
                  data-location-id="137391,059582,140142,128587,064500,148183"
                  data-language="IT"
                  data-unit-system="METRIC"
                  data-skin="dark"
                  data-widget-type="current6"
                  style="padding-bottom:22px;position:relative;"
              >
                <a
                  href="https://www.tomorrow.io/weather/"
                  target="_blank"
                  style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;"
                >
                  <img
                    alt="Powered by Tomorrow.io"
                    src="https://weather-website-client.tomorrow.io/img/powered-by-tomorrow.svg"
                    width="140"
                    height="15"
                  />
                </a>
              </div>
              <!-- Weather Widget END -->
            </div>
            <div class="widget">
              <!-- https://it.tradingview.com/widget/market-overview/ -->
              <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget">
                </div>
                <div class="tradingview-widget-copyright">
                  <a href="https://it.tradingview.com" target="_blank">
                    <span class="blue-text">
                      Grafici
                    </span>
                  </a> 
                  da TradingView
                </div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                {
                  "colorTheme": "dark",
                  "dateRange": "12M",
                  "showChart": true,
                  "locale": "it",
                  "largeChartUrl": "",
                  "isTransparent": false,
                  "showSymbolLogo": true,
                  "showFloatingTooltip": false,
                  "width": "333",
                  "height": "660",
                  "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                  "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                  "gridLineColor": "rgba(240, 243, 250, 0)",
                  "scaleFontColor": "rgba(120, 123, 134, 1)",
                  "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                  "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                  "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                  "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                  "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                  "tabs": [
                    {
                      "title": "Indici",
                      "symbols": [
                        {
                          "s": "FOREXCOM:SPXUSD",
                          "d": "S&P 500"
                        },
                        {
                          "s": "FOREXCOM:NSXUSD",
                          "d": "US 100"
                        },
                        {
                          "s": "FOREXCOM:DJI",
                          "d": "Dow 30"
                        },
                        {
                          "s": "INDEX:NKY",
                          "d": "Nikkei 225"
                        },
                        {
                          "s": "INDEX:DEU40",
                          "d": "DAX Index"
                        },
                        {
                          "s": "FOREXCOM:UKXGBP",
                          "d": "UK 100"
                        }
                      ],
                      "originalTitle": "Indices"
                    },
                    {
                      "title": "Futures",
                      "symbols": [
                        {
                          "s": "CME_MINI:ES1!",
                          "d": "S&P 500"
                        },
                        {
                          "s": "CME:6E1!",
                          "d": "Euro"
                        },
                        {
                          "s": "COMEX:GC1!",
                          "d": "Gold"
                        },
                        {
                          "s": "NYMEX:CL1!",
                          "d": "Crude Oil"
                        },
                        {
                          "s": "NYMEX:NG1!",
                          "d": "Natural Gas"
                        },
                        {
                          "s": "COMEX:SI1!",
                          "d": "Silver"
                        }
                      ],
                      "originalTitle": "Futures"
                    },
                    {
                      "title": "Forex",
                      "symbols": [
                        {
                          "s": "FX:EURUSD",
                          "d": "EUR/USD"
                        },
                        {
                          "s": "FX:GBPUSD",
                          "d": "GBP/USD"
                        },
                        {
                          "s": "FX:USDJPY",
                          "d": "USD/JPY"
                        },
                        {
                          "s": "FX:USDCHF",
                          "d": "USD/CHF"
                        },
                        {
                          "s": "FX:AUDUSD",
                          "d": "AUD/USD"
                        },
                        {
                          "s": "FX:USDCAD",
                          "d": "USD/CAD"
                        }
                      ],
                      "originalTitle": "Forex"
                    },
                    {
                      "title": "Crypto",
                      "symbols": [
                        {
                          "s": "BINANCE:BTCUSDT",
                          "d": "Bitcoin/Tether"
                        },
                        {
                          "s": "BINANCE:ETHUSDT",
                          "d": "Ethereum/Tether"
                        },
                        {
                          "s": "BINANCE:BNBUSDT",
                          "d": "Binance Coin/Tether"
                        },
                        {
                          "s": "BINANCE:SOLUSDT",
                          "d": "Solana/Tether"
                        },
                        {
                          "s": "BINANCE:APEUSDT",
                          "d": "ApeCoin/Tether"
                        },
                        {
                          "s": "BINANCE:DOTUSDT",
                          "d": "Polkadot/Tether"
                        }
                      ]
                    }
                  ]
                }
                </script>
              </div>
              <!-- TradingView Widget END -->
            </div>
            <div class="widget">
              <a href="https://www.theguardian.com/international" target="_blank">
                <img class="guardianimg" src="img/theguardian.jpg">
              </a>
              <section class="theguardian-news-titles">
              </section>
            </div>
          </section>
        </div>
        <div class="articles-container">
        </div>
      </div>
    </main>
      
    <footer class="blog-footer">
      <div class="div-footer">
        <div id="homework">
          <a>MHW3</a>
        </div>

        <div class="footer-info">
          <ul class="ul-footer">
            <li>
              <a href="#">About Us</a>
            </li>
            <li>
              <a href="#">Contact Us</a>
            </li>
            <li>
              <a href="#">Legal</a>
            </li>
          </ul>
        </div>

        <div class="newsletter">
          <p>Subscribe to our Newsletter</p>
          <form id="subscribe-form">
            <input class="footer-news" placeholder="Enter your email">
            <button id="footer-sub">Submit</button>
          </form>
        </div>
      </div>
      <section class="at">@1000005950</section>

    </footer>
  </body>
</html>
