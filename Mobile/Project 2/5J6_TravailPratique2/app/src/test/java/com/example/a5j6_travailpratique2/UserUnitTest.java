package com.example.a5j6_travailpratique2;

import org.junit.Test;

import static org.junit.Assert.*;
import static org.mockito.Mockito.mock;
import static org.mockito.Mockito.when;

/**
 * Example local unit test, which will execute on the development machine (host).
 *
 * @see <a href="http://d.android.com/tools/testing">Testing documentation</a>
 */
public class UserUnitTest {
    @Test
    public void createUser() {
        Utilisateur user = new Utilisateur("Jonathan", "lamontagne");

        assertEquals("Jonathan", user.getUserName());
        assertEquals("lamontagne", user.getUserPassword());
    }

    @Test
    public void UserAuthentification() throws Exception {
        LoginActivity loginActivity = mock(LoginActivity.class);
        when(loginActivity.getUserToken()).thenReturn("SuperTokenIdentityUser");

        String token = loginActivity.getUserToken();

        assertEquals("SuperTokenIdentityUser", token);
    }

}