from models import *
from django.forms import ModelForm
from django.contrib.localflavor.br.forms import BRPhoneNumberField as PhoneNumberField

class aluno_Form(ModelForm):
	telefone = PhoneNumberField()
	celular = PhoneNumberField()
	class Meta:
		model = Aluno