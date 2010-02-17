from django.db import models
from django.contrib.localflavor.br.forms import BRPhoneNumberField as PhoneNumberField

# Create your models here.
class Aluno(models.Model):
	nome = models.CharField(u'Nome', max_length = 255)
	numero_matricula = models.AutoField(primary_key=True)
	data_nascimento = models.DateField(u'Data nascimento')
	email = models.EmailField(u'E-mail')
	telefone = models.CharField(u'Telefone',max_length = 20)
	celular = models.CharField(u'Celular',max_length = 20)

class Turma(models.Model):
	nome = models.CharField(u'Nome da turma', max_length = 255)
	alunos = models.ManyToManyField(Aluno)
	

