/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package br.com.grupo1.fakewebservice.actions;

import br.com.grupo1.fakewebservice.entities.RegistroFornecimento;
import br.com.grupo1.fakewebservice.pojo.FornecimentoManager;
import com.opensymphony.xwork2.ActionSupport;
import java.util.List;
import org.apache.struts2.convention.annotation.Action;
import org.apache.struts2.convention.annotation.Result;
import org.springframework.beans.factory.annotation.Autowired;

/**
 *
 * @author jorge
 */
public class FornecimentoAction extends ActionSupport {

    @Autowired
    private FornecimentoManager fornecimentoManager;

    private List<RegistroFornecimento> registrosFornecimento;

    @Action(value="/fornecimento",results={@Result(name="success", location="/fornecimento.jsp")})
    @Override
    public String execute() {
        this.registrosFornecimento = fornecimentoManager.listarTodosFornecimentos();
        return "success";
    }

    public List<RegistroFornecimento> getRegistrosFornecimento() {
        return registrosFornecimento;
    }

    public FornecimentoManager getFornecimentoManager() {
        return fornecimentoManager;
    }

}
