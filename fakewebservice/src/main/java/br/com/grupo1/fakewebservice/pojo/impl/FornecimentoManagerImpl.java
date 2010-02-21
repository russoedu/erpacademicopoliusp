/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package br.com.grupo1.fakewebservice.pojo.impl;

import br.com.grupo1.fakewebservice.entities.RegistroFornecimento;
import br.com.grupo1.fakewebservice.pojo.FornecimentoManager;
import java.util.Date;
import java.util.List;
import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

/**
 *
 * @author jorge
 */
@Service
public class FornecimentoManagerImpl implements FornecimentoManager {

    @Autowired
    private SessionFactory sessionFactory;

    public void registrarConsumo(int parametroA, int parametroB) {;
        RegistroFornecimento rf = new RegistroFornecimento();
        rf.setParametroA(parametroA);
        rf.setParametroB(parametroB);
        rf.setHorario(new Date());

        Session session = this.sessionFactory.openSession();
        Transaction tx = session.beginTransaction();
        session.save(rf);
        tx.commit();
        session.close();
    }

    public List<RegistroFornecimento> listarTodosFornecimentos() {
        List<RegistroFornecimento> result = null;

        Session session = this.sessionFactory.openSession();
        Transaction tx = session.beginTransaction();
        Criteria criteria = session.createCriteria(RegistroFornecimento.class);
        result = criteria.list();
        tx.commit();
        session.close();

        return result;
    }

}
