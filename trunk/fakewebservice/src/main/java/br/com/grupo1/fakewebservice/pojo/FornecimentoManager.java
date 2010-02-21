/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package br.com.grupo1.fakewebservice.pojo;

import br.com.grupo1.fakewebservice.entities.RegistroFornecimento;
import java.util.List;

/**
 *
 * @author jorge
 */
public interface FornecimentoManager {

    public void registrarConsumo(int parametroA, int parametroB);

    public List<RegistroFornecimento> listarTodosFornecimentos();

}
