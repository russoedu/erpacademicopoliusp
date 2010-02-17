# Create your views here.
from alunos.models import *
from alunos.forms import *
from django.shortcuts import render_to_response

def novo(request):
	if request.method == "GET":
		form = aluno_Form()
	elif request.method == "POST":
		post = request.POST.copy()
		form = aluno_Form(post)
		if form.is_valid():
			form.save()
	else:
		assert 0
		
	contexto = locals()
	return render_to_response('alunos/novo.html', contexto)

def lista(request):
	assert 0
	
def detalhes(request, aluno_id):
	id = int(aluno_id)
	aluno = Aluno.objects.get(pk = id)
	form = aluno_Form(instance = aluno)
	contexto = locals()
	return render_to_response('alunos/novo.html', contexto)