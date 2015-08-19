<div class="white-row styleBackground container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="center-box">
        <h1> MAINTENANCE MODE<br>
          <small class="subtitle">
          <?= $_application['config']->setting('site_name'); ?> is undergoing scheduled maintenance. Please check back soon.
          <br><br><code class="text-center terminal" style="color: white">Current status:</code>
          </small>
        </h1>
        <div class="row text-left">
          <div class="col-md-12">
            <div class="row text-left">
              <div class="col-md-12">
                <div class="progress-bars">
                
                  <div class="progress-label"> <span>Progress</span> </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-primary" data-appear-progress-animation="81%"> <span class="progress-bar-tooltip">81%</span> </div>
                  </div>
                  
                  <div class="progress-label"> <span>Estimated time of return</span> </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-warning" data-appear-progress-animation="100%" data-appear-animation-delay="300"> 
                    <span class="progress-bar-tooltip"><?= date('H')+1; ?><?= date(':i a'); ?></span> </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

