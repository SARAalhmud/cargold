@extends('layouts.navigation')
@section('nav')

  <!-- Page Header -->
  <div class="page-header py-5 bg-black">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1 class="display-4 text-white">من <span class="golden-text">نحن</span></h1>
          <p class="text-muted">تعرف على قصتنا ورؤيتنا ورسالتنا في عالم السيارات الفاخرة</p>
        </div>
        <div class="col-md-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-md-end golden-breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white">الرئيسية</a></li>
              <li class="breadcrumb-item active golden-text" aria-current="page">من نحن</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- About Us Section -->
  <section class="about-us py-5 bg-dark">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <div class="position-relative">
            <img src="https://images.unsplash.com/photo-1573116402348-929766f46b42?q=80&w=1974&auto=format&fit=crop" class="img-fluid rounded" alt="سيارتي الذهبية">
            <div class="experience-badge golden-bg p-3 rounded position-absolute bottom-0 end-0 mb-4 me-4">
              <h4 class="mb-0 text-black text-center">15+ عام</h4>
              <p class="mb-0 text-black text-center">من الخبرة</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <h2 class="text-white mb-3">قصة <span class="golden-text">نجاحنا</span></h2>
          <p class="text-muted">تأسست شركة "سيارتي الذهبية" في عام 2025 بهدف تسهيل عملية البيع والشراء وتقديم تجربة استثنائية في عالم السيارات الفاخرة. رغم حداثة انطلاقتنا، إلا أن رؤيتنا الطموحة وفريقنا المتميز مكننا من تقديم خدمات مبتكرة في السوق السورية.</p>

          <p class="text-muted">منذ تأسيسنا، وضعنا نصب أعيننا تحدي الصعوبات في السوق السورية وتطوير منصة متطورة تجمع بين البائعين والمشترين بطريقة آمنة وسهلة، مع التركيز على تجربة مستخدم فريدة تناسب احتياجات السوق المحلية.</p>

          <p class="text-muted">اليوم، تقدم "سيارتي الذهبية" منصة متكاملة لبيع وشراء السيارات في سوريا، مع مجموعة متنوعة من الخطط الاشتراكية للبائعين وخدمات قيمة للمشترين، مما يجعلنا الخيار الأول للمهتمين بعالم السيارات محلياً.</p>

          <div class="mt-4">
            <a href="contact.html" class="btn golden-btn me-2">تواصل معنا</a>
            <a href="features.html" class="btn btn-outline-golden">اكتشف خدماتنا</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision & Mission -->
  <section class="vision-mission py-5 bg-black">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
          <div class="vision-card bg-dark rounded p-4 h-100">
            <div class="vision-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-eye text-black"></i>
            </div>
            <h3 class="text-white mb-3">رؤيتنا</h3>
            <p class="text-muted">نطمح لأن نكون الرائدين في مجال بيع وصيانة السيارات الفاخرة في الشرق الأوسط، وأن نقدم تجربة لا مثيل لها لعملائنا تتجاوز توقعاتهم وتلبي طموحاتهم.</p>
            <p class="text-muted">نسعى لتطوير صناعة السيارات الفاخرة في المنطقة من خلال تقديم أحدث التقنيات والخدمات العصرية التي تواكب التطور العالمي في هذا المجال.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="mission-card bg-dark rounded p-4 h-100">
            <div class="mission-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-bullseye text-black"></i>
            </div>
            <h3 class="text-white mb-3">رسالتنا</h3>
            <p class="text-muted">تقديم تجربة فريدة ومتكاملة لعملائنا في عالم السيارات الفاخرة من خلال توفير أفضل العلامات التجارية العالمية بأسعار تنافسية وخدمات احترافية.</p>
            <p class="text-muted">نلتزم بتحقيق أعلى معايير الجودة والشفافية في جميع تعاملاتنا، وبناء علاقات طويلة الأمد مع عملائنا تقوم على الثقة المتبادلة والاحترام.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Values -->
  <section class="our-values py-5 bg-dark">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="text-white">قيمنا <span class="golden-text">ومبادئنا</span></h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">المبادئ الأساسية التي تحكم عملنا وتعاملاتنا مع عملائنا وشركائنا</p>
      </div>

      <div class="row g-4">
        <!-- Value 1 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-star-fill text-black"></i>
            </div>
            <h4 class="text-white mb-3">التميز</h4>
            <p class="text-muted">نسعى دائماً للتميز في كل ما نقدمه، من جودة السيارات إلى مستوى الخدمة للعملاء وما بعد البيع.</p>
          </div>
        </div>

        <!-- Value 2 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-shield-check text-black"></i>
            </div>
            <h4 class="text-white mb-3">النزاهة</h4>
            <p class="text-muted">نؤمن بالشفافية والصدق في جميع تعاملاتنا، ونحرص على بناء الثقة مع عملائنا من خلال الالتزام بوعودنا.</p>
          </div>
        </div>

        <!-- Value 3 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-lightbulb text-black"></i>
            </div>
            <h4 class="text-white mb-3">الابتكار</h4>
            <p class="text-muted">نحرص على مواكبة أحدث التطورات في عالم السيارات وتبني التقنيات الحديثة لتحسين تجربة عملائنا.</p>
          </div>
        </div>

        <!-- Value 4 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-people-fill text-black"></i>
            </div>
            <h4 class="text-white mb-3">التعاون</h4>
            <p class="text-muted">نؤمن بأهمية العمل الجماعي والتعاون مع شركائنا وموظفينا لتحقيق أهدافنا المشتركة وتقديم الأفضل لعملائنا.</p>
          </div>
        </div>

        <!-- Value 5 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-heart-fill text-black"></i>
            </div>
            <h4 class="text-white mb-3">الاهتمام بالعملاء</h4>
            <p class="text-muted">عملاؤنا هم محور اهتمامنا، ونسعى دائماً لفهم احتياجاتهم وتلبيتها بشكل يفوق توقعاتهم.</p>
          </div>
        </div>

        <!-- Value 6 -->
        <div class="col-md-4">
          <div class="value-card bg-black rounded p-4 text-center h-100">
            <div class="value-icon golden-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-3">
              <i class="bi bi-graph-up-arrow text-black"></i>
            </div>
            <h4 class="text-white mb-3">التطور المستمر</h4>
            <p class="text-muted">نسعى دائماً للتعلم والتطور وتحسين خدماتنا ومنتجاتنا بما يتناسب مع احتياجات السوق المتغيرة.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Team -->
  <section class="our-team py-5 bg-black">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="text-white">فريق <span class="golden-text">العمل</span></h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">تعرف على فريقنا المتميز الذي يسعى دائماً لتقديم أفضل الخدمات لعملائنا</p>
      </div>

      <div class="row g-4">
        <!-- Team Member 1 -->
        <div class="col-lg-3 col-md-6">
          <div class="team-card bg-dark rounded overflow-hidden h-100">
            <div class="position-relative">
              <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1974&auto=format&fit=crop" class="card-img-top" alt="Team Member">
            </div>
            <div class="card-body text-center p-4">
              <h5 class="text-white mb-1">أحمد الحسيني</h5>
              <p class="golden-text mb-3">المدير التنفيذي</p>
              <p class="text-muted small">خبرة أكثر من 20 عاماً في مجال السيارات الفاخرة وإدارة المعارض</p>
              <div class="social-icons mt-3">
                <a href="#" class="me-2 text-white"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-twitter"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Team Member 2 -->
        <div class="col-lg-3 col-md-6">
          <div class="team-card bg-dark rounded overflow-hidden h-100">
            <div class="position-relative">
              <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=1976&auto=format&fit=crop" class="card-img-top" alt="Team Member">
            </div>
            <div class="card-body text-center p-4">
              <h5 class="text-white mb-1">سارة القاسم</h5>
              <p class="golden-text mb-3">مديرة المبيعات</p>
              <p class="text-muted small">خبرة 12 عاماً في مبيعات السيارات الفاخرة وتطوير استراتيجيات المبيعات</p>
              <div class="social-icons mt-3">
                <a href="#" class="me-2 text-white"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-twitter"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Team Member 3 -->
        <div class="col-lg-3 col-md-6">
          <div class="team-card bg-dark rounded overflow-hidden h-100">
            <div class="position-relative">
              <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=2070&auto=format&fit=crop" class="card-img-top" alt="Team Member">
            </div>
            <div class="card-body text-center p-4">
              <h5 class="text-white mb-1">عمر النجار</h5>
              <p class="golden-text mb-3">رئيس قسم الصيانة</p>
              <p class="text-muted small">مهندس ميكانيكي متخصص في صيانة السيارات الفاخرة مع خبرة 15 عاماً</p>
              <div class="social-icons mt-3">
                <a href="#" class="me-2 text-white"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-twitter"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

        <!-- Team Member 4 -->
        <div class="col-lg-3 col-md-6">
          <div class="team-card bg-dark rounded overflow-hidden h-100">
            <div class="position-relative">
              <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=1961&auto=format&fit=crop" class="card-img-top" alt="Team Member">
            </div>
            <div class="card-body text-center p-4">
              <h5 class="text-white mb-1">ليلى عبد الله</h5>
              <p class="golden-text mb-3">مديرة خدمة العملاء</p>
              <p class="text-muted small">متخصصة في تطوير خدمات العملاء وبناء العلاقات مع خبرة 10 سنوات</p>
              <div class="social-icons mt-3">
                <a href="#" class="me-2 text-white"><i class="bi bi-facebook"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-twitter"></i></a>
                <a href="#" class="me-2 text-white"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
