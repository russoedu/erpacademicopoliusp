﻿from django.conf.urls.defaults import *

# Uncomment the next two lines to enable the admin:
#from django.contrib import admin
#admin.autodiscover()

urlpatterns = patterns('ERP.alunos.views',
     (r'novo/$','novo'),
     (r'^(?P<aluno_id>\d+)/$','detalhes'),
     
)
